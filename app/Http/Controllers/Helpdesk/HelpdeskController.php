<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function helpdeskUpdate(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $ticket->idmodule = $request->idmodule;
            $ticket->iduser_pic = $request->iduser_pic;
            $ticket->priority = $request->priority;
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
