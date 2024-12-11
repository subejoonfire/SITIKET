<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
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
            'category' => 'required|string|max:255',
            'detailissue' => 'required|string',
        ]);
        $count = Ticket::where('iduser', auth()->user()->id)->count();
        Ticket::create([
            'ticketcode' => 'TKT' . auth()->user()->id . date('Ymd') . $count,
            'iduser' => auth()->user()->id,
            'idmodule' => $request->input('idmodule'),
            'issue' => $request->input('issue'),
            'priority' => $request->input('priority'),
            'category' => $request->input('category'),
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
}
