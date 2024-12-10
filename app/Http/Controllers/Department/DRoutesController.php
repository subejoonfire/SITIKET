<?php

namespace App\Http\Controllers\Department;

use App\Models\User;
use App\Models\Ticket;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Models\UserDepartment;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DRoutesController extends Controller
{
    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
        ];

        return view('pages.department.profile', $data);
    }

    public function dashboard()
    {

        $data = [
            'title' => 'BERANDA | SI-TICKET',
            'page' => 'beranda',
            'approved' => Ticket::where('status', 'DISETUJUI')->count(),
            'declined' => Ticket::where('status', 'DITOLAK')->count(),
            'processed' => Ticket::where('status', 'DIPROSES')->count(),
            'done' => Ticket::where('status', 'SELESAI')->count(),
        ];

        return view('pages.department.dashboard', $data);
    }
    public function ticket()
    {
        $data = [
            'title' => 'SI-TIKET | TIKET',
            'collection' => Ticket::with(['users', 'departments'])
                ->whereHas('departments', function ($query) {
                    $query->whereNotNull('iddepartment')
                        ->where('iddepartment', auth()->user()->iddepartment);
                })
                ->get()
        ];
        return view('pages.department.ticket.index', $data);
    }

    public function approved()
    {
        $data = [
            'title' => 'SI-TIKET | DISETUJUI',
            'collection' => Ticket::with(['users', 'departments'])
                ->whereHas('departments', function ($query) {
                    $query->whereNotNull('iddepartment')
                        ->where([
                            'iddepartment' => auth()->user()->iddepartment,
                            'status' => 'DISETUJUI'
                        ]);
                })
                ->get()
        ];
        return view('pages.department.ticket.approved.index', $data);
    }

    public function processed()
    {
        $data = [
            'title' => 'SI-TIKET | DIPROSES',
            'collection' => Ticket::with(['users', 'departments'])
                ->whereHas('departments', function ($query) {
                    $query->whereNotNull('iddepartment')
                        ->where([
                            'iddepartment' => auth()->user()->iddepartment,
                            'status' => 'DIPROSES'
                        ]);
                })
                ->get()
        ];
        return view('pages.department.ticket.processed.index', $data);
    }

    public function declined()
    {
        $data = [
            'title' => 'SI-TIKET | DITOLAK',
            'collection' => Ticket::with(['users', 'departments'])
                ->whereHas('departments', function ($query) {
                    $query->whereNotNull('iddepartment')
                        ->where([
                            'iddepartment' => auth()->user()->iddepartment,
                            'status' => 'DITOLAK'
                        ]);
                })
                ->get()
        ];
        return view('pages.department.ticket.declined.index', $data);
    }

    public function done()
    {
        $data = [
            'title' => 'SI-TIKET | SELESAI',
            'collection' => Ticket::with(['users', 'departments'])
                ->whereHas('departments', function ($query) {
                    $query->whereNotNull('iddepartment')
                        ->where([
                            'iddepartment' => auth()->user()->iddepartment,
                            'status' => 'SELESAI'
                        ]);
                })
                ->get()
        ];
        return view('pages.department.ticket.done.index', $data);
    }
    public function review($type, $id)
    {

        $data = [
            'title' => 'SITIKET | Review',
            'type' => $type,
            'data' => Ticket::with(['users', 'departments'])->where('id', $id)->first(),
        ];
        if ($type == 'approved') {
            return view('pages.department.ticket.review', $data);
        } elseif ($type == 'processed') {
            return view('pages.department.ticket.review', $data);
        } elseif ($type == 'index') {
            return view('pages.department.ticket.review', $data);
        } elseif ($type == 'done') {
            return view('pages.department.ticket.review', $data);
        }
        return redirect()->back()->with('error', 'Halaman yang anda cari tidak ditemukan');
    }
}
