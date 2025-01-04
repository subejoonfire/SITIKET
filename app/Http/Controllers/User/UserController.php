<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use App\Models\Message;
use App\Models\Document;
use App\Models\UserTicket;
use App\Models\UsersTickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function userStore(Request $request)
    {
        $request->validate([
            'issue' => 'required|string|max:255',
            'idmodule' => 'integer|integer',
            'idpriority' => 'nullable|integer',
            'idcategory' => 'required|integer',
            'detailissue' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        $count = Ticket::where('iduser', auth()->user()->id)->count();
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $extension = $file->getClientOriginalExtension();
            $uniqueFileName = 'attach_' . auth()->user()->id . '_' . time() . '_' . uniqid() . '.' . $extension;
            $attachmentPath = $file->storeAs('attachments', $uniqueFileName, 'public');
        }
        $ticket = Ticket::create([
            'ticketcode' => 'TKT' . auth()->user()->id . date('Ymd') . rand(100, 999),
            'idmodule' => $request->input('idmodule'),
            'issue' => $request->input('issue'),
            'idpriority' => $request->input('idpriority'),
            'idcategory' => $request->input('idcategory'),
            'detailissue' => $request->input('detailissue'),
            'attachment' => $attachmentPath,
            'status' => 'TERKIRIM',
        ]);
        UsersTickets::create([
            'iduser' => auth()->user()->id,
            'idticket' => $ticket->id,
        ]);
        return redirect()->to('user')->with('success', 'Request berhasil dikirim!');
    }

    public function userDelete($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);
            $userticket = UsersTickets::where('idticket', $id);
            $ticket->delete();
            $userticket->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('user')->with('success', 'Ticket berhasil dihapus!');
    }
}
