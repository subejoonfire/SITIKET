<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Department;
use App\Http\Controllers\Controller;

class HRoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => Ticket::whereNull('iddepartment')->count(),
            'done' => Ticket::whereNotNull('iddepartment')->count(),
            'collection' => Ticket::get()
        ];
        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => Ticket::where('id', $id)->first(),
            'department' => Department::all(),
            'pic' => User::where('level', 3)->get(),
        ];

        return view('pages.helpdesk.detailvalidation', $data);
    }

    public function detailhistory($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => Ticket::where('id', $id)->first(),
            'department' => Department::all(),
            'pic' => User::where('level', 3)->get(),
        ];

        return view('pages.helpdesk.detailhistory', $data);
    }

    public function history()
    {

        $data = [
            'title' => 'SI-TIKET | RIWAYAT_VALIDASI',
            'collection' => Ticket::whereNotNull('tickets.iddepartment')->get(),
            'page' => 'beranda',
        ];


        return view('pages.helpdesk.history', $data);
    }
    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | HALAMAN_VALIDASI',
            'collection' => Ticket::whereNotNull('tickets.iddepartment')->get(),
            'page' => 'validation',
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
