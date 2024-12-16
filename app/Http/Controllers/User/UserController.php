<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use App\Models\Message;
use App\Models\Document;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function userStore(Request $request)
    {
        $request->validate([
            'issue' => 'required|string|max:255',
            'idmodule' => 'integer|max:5',
            'priority' => 'string|max:255',
            'idcategory' => 'required|integer|max:10',
            'detailissue' => 'required|string',
        ]);
        $count = Ticket::where('iduser', auth()->user()->id)->count();
        Ticket::create([
            'ticketcode' => 'TKT' . auth()->user()->id . date('Ymd') . $count,
            'iduser' => auth()->user()->id,
            'idmodule' => $request->input('idmodule'),
            'issue' => $request->input('issue'),
            'priority' => $request->input('priority'),
            'idcategory' => $request->input('idcategory'),
            'detailissue' => $request->input('detailissue'),
            'status' => 'TERKIRIM',
        ]);
        return redirect()->to('user')->with('success', 'Request berhasil dikirim!');
    }

    public function userDelete($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('user')->with('success', 'Ticket berhasil dihapus!');
    }
    public function message_store(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $message = new Message();
        $message->message = $request->input('message');
        $message->idticket = $id;
        $message->iduser_from = auth()->user()->id;
        $message->iduser_to = $ticket->iduser_pic;
        $message->save();
        if ($request->hasFile('documentname')) {
            foreach ($request->file('documentname') as $file) {
                $extension = $file->getClientOriginalExtension();
                $uniqueFileName = 'doc_' . auth()->user()->id . '_' . time() . '_' . uniqid() . '.' . $extension;
                $filePath = $file->storeAs('documents', $uniqueFileName, 'public');

                $document = new Document();
                $document->idmessage = $message->id;
                $document->documentname = $file->getClientOriginalName();
                $document->path_documentname = $filePath;
                $document->save();
            }
        }
        return redirect()->back();
    }
}
