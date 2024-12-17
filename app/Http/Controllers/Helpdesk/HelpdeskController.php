<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\UsersTickets;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function helpdeskUpdate(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return redirect()->to('helpdesk/validation')->with('error', 'Ticket tidak ditemukan');
        }

        $request->validate([
            'idmodule' => 'required|exists:modules,id',
            'priority' => 'required|string',
            'iduser_pic.*' => 'nullable|exists:users,id',
        ]);

        UsersTickets::where('idticket', $id)->delete();

        foreach ($request->iduser_pic as $iduser_pic) {
            if (is_null($iduser_pic) || $iduser_pic === '') continue;
            $users_tickets = new UsersTickets();
            $users_tickets->idticket = $id;
            $users_tickets->iduser = $ticket->iduser;
            $users_tickets->iduser_pic = $iduser_pic;
            $users_tickets->save();
        }
        $ticket->idmodule = $request->idmodule;
        $ticket->priority = $request->priority;
        $ticket->status = 'DIAJUKAN';
        $ticket->save();

        return redirect()->to('helpdesk/validation')->with('success', 'Ticket berhasil diperbarui');
    }
}