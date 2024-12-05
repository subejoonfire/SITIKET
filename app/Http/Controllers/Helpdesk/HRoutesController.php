<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\Ticket;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HRoutesController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'collection' => Ticket::join('user_tickets', 'user_tickets.idticket', '=', 'tickets.id')->join('departments', 'departments.id', '=', 'tickets.iddepartment')->join('users', 'user_tickets.iduser', '=', 'users.id')->get()
        ];

        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail()
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
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
