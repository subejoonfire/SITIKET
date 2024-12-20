<?php

namespace App\Http\Controllers\PIC;

use App\Models\Ticket;
use App\Models\Message;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PICController extends Controller
{
    public function approved($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'DISETUJUI';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('pic/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('pic/ticket/approved')->with('success', 'Tiket berhasil di setujui.');
    }
    public function declined($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'DITOLAK';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('pic/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('pic/ticket/declined')->with('success', 'Tiket berhasil di setujui.');
    }
    public function processed($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'DIPROSES';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('pic/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('pic/ticket/processed')->with('success', 'Tiket berhasil di setujui.');
    }
    public function done($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'SELESAI';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('pic/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('pic/ticket/done')->with('success', 'Tiket berhasil di setujui.');
    }
}
