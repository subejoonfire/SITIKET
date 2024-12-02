<?php

namespace App\Http\Controllers\Department;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DRoutesController extends Controller
{
    public function dashboard()
    {

        $data = [
            'title' => 'BERANDA | SI-TICKET',
            'page' => 'beranda',
        ];

        return view('pages.department.dashboard', $data);
    }
    public function tiket()
    {
        $data = [
            'title' => 'SI-TIKET | TIKET',
            'collection' => Ticket::all(),
        ];
        return view('pages.department.ticket.ticket', $data);
    }

    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | DISETUJUI'
        ];
        return view('pages.department.ticket.approved', $data);
    }

    public function proses()
    {
        $data = [
            'title' => 'SI-TIKET | DIPROSES'
        ];
        return view('pages.department.ticket.processed', $data);
    }

    public function tolak()
    {
        $data = [
            'title' => 'SI-TIKET | DITOLAK'
        ];
        return view('pages.department.ticket.declined', $data);
    }

    public function selesai()
    {
        $data = [
            'title' => 'SI-TIKET | SELESAI'
        ];
        return view('pages.department.ticket.done', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
        ];

        return view('pages.department.profile', $data);
    }
}
