<?php

namespace App\Http\Controllers\Helpdesk;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Followup;
use App\Models\UsersTickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpdeskController extends Controller
{
    public function helpdeskUpdate(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket tidak ditemukan');
        }
        $request->validate([
            'idmodule' => 'required|exists:modules,id',
            'iduser_pic.*' => 'nullable|exists:users,id',
        ]);
        $filtered_iduser_pic = array_filter($request->iduser_pic, function ($value) {
            return !is_null($value) && $value !== '';
        });
        if (count($filtered_iduser_pic) !== count(array_unique($filtered_iduser_pic))) {
            return redirect()->back()->withErrors(['iduser_pic' => 'PIC tidak boleh duplikat.'])->withInput();
        }
        UsersTickets::where('idticket', $id)->delete();
        foreach ($filtered_iduser_pic as $iduser_pic) {
            $users_tickets = new UsersTickets();
            $users_tickets->idticket = $id;
            $users_tickets->iduser = $ticket->iduser;
            $users_tickets->iduser_pic = $iduser_pic;
            $users_tickets->save();
        }
        $ticket->idmodule = $request->idmodule;
        $ticket->idpriority = $request->idpriority;
        $ticket->status = 'DIAJUKAN';
        $ticket->save();
        return redirect()->back()->with('success', 'Ticket berhasil diperbarui');
    }
    public function followup_delete($id)
    {
        Followup::find($id)->delete();
        return redirect()->back()->with('success', 'Ticket berhasil dihapus');
    }
}
