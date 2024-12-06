<?php

namespace App\Http\Controllers\Department;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentController extends Controller
{
    public function approved($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'DISETUJUI';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('department/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('department/ticket/approved')->with('success', 'Tiket berhasil di setujui.');
    }
    public function declined($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'DITOLAK';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('department/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('department/ticket/declined')->with('success', 'Tiket berhasil di setujui.');
    }
    public function processed($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'DIPROSES';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('department/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('department/ticket/processed')->with('success', 'Tiket berhasil di setujui.');
    }
    public function done($id)
    {
        try {

            $ticket = Ticket::findOrFail($id);
            $ticket->status  = 'SELESAI';
            $ticket->save();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('department/ticket')->with('error', 'Ticket tidak ditemukan.');
        }
        return redirect()->to('department/ticket/done')->with('success', 'Tiket berhasil di setujui.');
    }
}
