<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Followup;
use App\Models\Priority;
use App\Models\Department;
use App\Http\Controllers\Controller;

class HRoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => Ticket::with(['users_tickets'])->whereDoesntHave('users_tickets')->count(),
            'done' => Ticket::with(['users_tickets'])->whereHas('users_tickets')->count(),
        ];
        return view('pages/helpdesk/dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => Ticket::with([
                'categories',
                'users.companies',
                'users.departments',
            ])->where('id', $id)->first(),
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
            'collection' => Ticket::with([
                'users_tickets',
                'users',
                'modules'
            ])
                ->whereHas('users_tickets')->get(),
            'page' => 'beranda',
        ];


        return view('pages/helpdesk/history', $data);
    }
    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | HALAMAN_VALIDASI',
            'collection' => Ticket::with([
                'users_tickets',
                'users.companies',
                'modules'
            ])
                ->whereDoesntHave('users_tickets')->get(),
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
    public function helpdesk_followupdetail($id)
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'data' => Ticket::with([
                'categories',
                'users.companies',
                'users.departments',
                'followups',
            ])->where('id', $id)->first(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        dd($data);
        return view('pages/helpdesk/followup/detail', $data);
    }
}
