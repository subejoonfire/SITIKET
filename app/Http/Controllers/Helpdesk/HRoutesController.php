<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\Ticket;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTicket;

class HRoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => Ticket::with('departments')->whereNotNull('iddepartments')->count(),
            'done' => Ticket::with('departments')->whereNull('iddepartments')->count(),
            'collection' => UserTicket::with(['users', 'tickets.departments'])->get()
        ];

        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => UserTicket::with(['users', 'tickets'])->where('idticket', $id)->first(),
            'collection' => Department::all(),
        ];

        return view('pages.helpdesk.detail', $data);
    }

    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | RIWAYAT_VALIDASI',
            'page' => 'beranda',
        ];


        return view('pages.helpdesk.validasi', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
            'page' => 'beranda',
        ];


        return view('pages.helpdesk.profile', $data);
    }
}
