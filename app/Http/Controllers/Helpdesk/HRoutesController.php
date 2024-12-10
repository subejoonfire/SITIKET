<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\Ticket;
use App\Models\Department;
use App\Http\Controllers\Controller;

class HRoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => Ticket::with('departments')->whereNull('iddepartment')->count(),
            'done' => Ticket::with('departments')->whereNotNull('iddepartment')->count(),
            'collection' => Ticket::with(['users', 'departments'])->get()
        ];
        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => Ticket::with(['users'])->where('tickets.id', $id)->first(),
            'collection' => Department::all(),
        ];

        return view('pages.helpdesk.detail', $data);
    }

    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | RIWAYAT_VALIDASI',
            'collection' => Ticket::with(['users', 'departments'])->whereNotNull('tickets.iddepartment')->get(),
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
