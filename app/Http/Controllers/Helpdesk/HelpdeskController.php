<?php

namespace App\Http\Controllers\Helpdesk;

use App\Events\TicketEvent;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Followup;
use App\Models\UsersTickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pics;

class HelpdeskController extends Controller
{
    public function helpdeskUpdate(Request $request, $id)
    {
        $users_tickets = UsersTickets::where('id', $id)->first();
        $ticket = Ticket::find($users_tickets->idticket);
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

        $pics = Pics::where('iduserticket', $id)->delete();
        foreach ($filtered_iduser_pic as $iduser_pic) {
            $pics = new Pics();
            $pics->iduserticket = $id;
            $pics->iduser_pic = $iduser_pic;
            $pics->save();
        }
        $ticket->idmodule = $request->idmodule;
        $ticket->idpriority = $request->idpriority;
        $ticket->status = 'DIAJUKAN';
        $ticket->save();
        UsersTickets::where('id', $id)->update(['validated' => 1]);
        return redirect()->back()->with('success', 'Ticket berhasil diperbarui');
    }

    public function followup_doneaction($id)
    {
        $followup = Followup::where('idticket', $id)->first();

        if ($followup) {
            $followup->update(['status' => true]);
            return redirect()->to(url('helpdesk/followup/done'))->with('success', 'Tindak lanjut berhasil dilakukan');
        } else {
            return redirect()->back()->with('error', 'Tindak lanjut sudah selesai');
        }
        return redirect()->back()->with('error', 'Data tindak lanjut tidak ditemukan');
    }
    public function followup_delete($id)
    {
        Followup::find($id)->delete();
        return redirect()->back()->with('success', 'Followup berhasil dihapus');
    }
}
