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
        try {
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('user')->with('success', 'Ticket berhasil dihapus!');
    }
}
