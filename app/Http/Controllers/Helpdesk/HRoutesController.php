<?php

namespace App\Http\Controllers\Helpdesk;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Department;
use App\Http\Controllers\Controller;

class HRoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => Ticket::whereNull('iduser_pic')->count(),
            'done' => Ticket::whereNotNull('iduser_pic')->count(),
        ];
        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => Ticket::with(['categories'])->where('id', $id)->first(),
            'module' => Module::all(),
            'pic' => User::where('level', 3)->get(),
        ];

        return view('pages.helpdesk.detail', $data);
    }
    public function history()
    {

        $data = [
            'title' => 'SI-TIKET | RIWAYAT_VALIDASI',
            'collection' => Ticket::whereNotNull('tickets.iduser_pic')->get(),
            'page' => 'beranda',
        ];


        return view('pages.helpdesk.history', $data);
    }
    public function validation()
    {

        $data = [
            'title' => 'SI-TIKET | HALAMAN_VALIDASI',
            'collection' => Ticket::whereNull(['tickets.iduser_pic', 'tickets.iduser_pic'])->get(),
            'page' => 'validation',
        ];


        return view('pages.helpdesk.validation', $data);
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
