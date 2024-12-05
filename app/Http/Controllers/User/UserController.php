<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\UserTicket;

class UserController extends Controller
{
    public function userStore(Request $request)
    {
        $request->validate([
            'trouble' => 'required|string|max:255',
        ]);
        $ticket = Ticket::create([
            'iddepartment' => $request->input('iddepartment'),
            'trouble' => $request->input('trouble'),
            'status' => 'PENDING',
        ]);
        UserTicket::create([
            'iduser' => auth()->user()->id,
            'idticket' => $ticket->id,
        ]);
        return redirect()->to('user')->with('success', 'Request berhasil dikirim! ID Tiket: ' . $ticket->id);
    }

    public function userDelete($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->to('user')->with('success', 'Ticket berhasil dihapus!');
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'iddepartment' => 'required|exists:departments,id',
            'trouble' => 'required|string|max:255',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'iddepartment' => $request->input('iddepartment'),
            'trouble' => $request->input('trouble'),
            'status' => $request->input('status', $ticket->status),
        ]);

        return redirect()->to('user')->with('success', 'Ticket berhasil diperbarui!');
    }
}
