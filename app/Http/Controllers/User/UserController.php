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
            'detailissue' => 'required|string',
        ]);
        $count = Ticket::where('iduser', auth()->user()->id)->count();
        $ticket = Ticket::create([
            'id' => 'TKT' . auth()->user()->id . date('Ymd') . $count,
            'iduser' => auth()->user()->id,
            'issue' => $request->input('issue'),
            'detailissue' => $request->input('detailissue'),
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
