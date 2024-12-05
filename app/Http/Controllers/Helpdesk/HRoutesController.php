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
        // $data = $this->ticket->with('tickets_helpdesk')->get();
        // foreach ($data as $ticket) {
        //     var_dump($ticket->tickets_helpdesk->first()->name);
        // }
        // die;
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'incoming' => $this->ticket->with('tickets_helpdesk')->whereNull('tickets.iddepartment')->count(),
            'done' => $this->ticket->with('tickets_helpdesk')->whereNotNull('tickets.iddepartment')->count(),
            'collection' => $this->ticket->with('tickets_helpdesk')->get()
        ];

        return view('pages.helpdesk.dashboard', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'data' => $this->ticket->with('tickets_helpdesk')->where('tickets.id', $id)->first(),
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