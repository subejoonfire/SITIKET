<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function helpdeskUpdate(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->iddepartment = $request->iddepartment;
            $ticket->status = 'DIPROSES';
            $ticket->save();

            return redirect()->to('helpdesk')
                ->with('success', 'Ticket berhasil diperbarui');
        } else {
            return redirect()->to('helpdesk')
                ->with('error', 'Ticket tidak ditemukan');
        }
    }
}
