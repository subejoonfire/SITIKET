<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function helpdeskUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'iddepartment' => 'required|exists:departments,id',
            'iduser_pic' => 'required|exists:users,id',
            'priority' => 'required|in:Bisa Menunggu,Sedang,Mendesak',
        ], [
            'iddepartment.required' => 'Departemen harus dipilih.',
            'iddepartment.exists' => 'Departemen yang dipilih tidak valid.',
            'iduser_pic.required' => 'PIC harus dipilih.',
            'iduser_pic.exists' => 'PIC yang dipilih tidak valid.',
            'priority.required' => 'Prioritas harus dipilih.',
            'priority.in' => 'Prioritas yang dipilih tidak valid.',
        ]);

        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->iddepartment = $validated['iddepartment'];
            $ticket->iduser_pic = $validated['iduser_pic'];
            $ticket->priority = $validated['priority'];
            $ticket->status = 'DIAJUKAN';
            $ticket->save();
            return redirect()->to('helpdesk/validation')
                ->with('success', 'Ticket berhasil diperbarui');
        } else {
            return redirect()->to('helpdesk/validation')
                ->with('error', 'Ticket tidak ditemukan');
        }
    }
}
