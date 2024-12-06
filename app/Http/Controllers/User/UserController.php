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
            'iduser' => auth()->user()->id,
            'trouble' => $request->input('trouble'),
            'status' => 'TERKIRIM',
        ]);
        return redirect()->to('user')->with('success', 'Request berhasil dikirim! ID Tiket: ' . $ticket->id);
    }

    public function userDelete($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->to('user')->with('success', 'Ticket berhasil dihapus!');
    }
}
