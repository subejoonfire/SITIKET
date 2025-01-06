<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Followup;
use App\Models\Priority;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\UsersTickets;

class HRoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => UsersTickets::where('validated', 0)->count(),
            'done' => UsersTickets::where('validated', 1)->count(),
        ];
        return view('pages/helpdesk/dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => UsersTickets::with([
                'tickets.categories',
                'pics',
                'users.companies',
                'users.departments',
            ])->where('idticket', $id)->first(),
            'module' => Module::all(),
            'priority' => Priority::all(),
            'pic' => User::where('level', 3)->get(),
        ];
        return view('pages/helpdesk/detail', $data);
    }
    public function history()
    {

        $data = [
            'title' => 'SI-TIKET | RIWAYAT_VALIDASI',
            'collection' => UsersTickets::with([
                'users.companies',
                'tickets.modules'
            ])->where('validated', 1)->get(),
            'page' => 'beranda',
        ];
        return view('pages/helpdesk/history', $data);
    }
    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | HALAMAN_VALIDASI',
            'collection' => UsersTickets::with([
                'users.companies',
                'tickets.modules'
            ])->where('validated', 0)->get(),
            'page' => 'validation',
        ];
        return view('pages/helpdesk/validation', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
            'page' => 'beranda',
        ];


        return view('pages/helpdesk/profile', $data);
    }

    public function followup()
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'collection' => Followup::with('tickets', 'users')->get(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        return view('pages/helpdesk/followup/index', $data);
    }

    public function followup_waiting()
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'collection' => Followup::with('tickets', 'users')->where('status', 0)->get(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        return view('pages/helpdesk/followup/waiting', $data);
    }
    public function followup_done()
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'collection' => Followup::with('tickets', 'users')->where('status', 1)->get(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        return view('pages/helpdesk/followup/done', $data);
    }
    public function helpdesk_followupdetail($type, $id)
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'data' => UsersTickets::with([
                'tickets.categories',
                'users.companies',
                'users.departments',
                'tickets.modules',
                'tickets.followups',
            ])->where('id', $id)->first(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'type' => $type,
        ];
        // dd($data);
        return view('pages/helpdesk/followup/detail', $data);
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
}
