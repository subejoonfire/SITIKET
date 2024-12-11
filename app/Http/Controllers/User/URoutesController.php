<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Department;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class URoutesController extends Controller
{
    public function index()
    {
        $ticket = new Ticket();
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'collection' => Ticket::with(['users', 'departments'])->where('iduser', auth()->user()->id)->get(),
            'count' => Ticket::where('iduser', auth()->user()->id)->count(),
        ];
        return view('pages.user.dashboard', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'SI-TIKET | ADD',
            'collection' => Department::all(),
        ];

        return view('pages.user.addrequest', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | Profile'
        ];

        return view('pages.user.profile', $data);
    }

    public function review($id)
    {

        $data = [
            'title' => 'SI-TIKET | Review',
            'data' => Ticket::where('iduser', $id)->first(),
        ];

        return view('pages.user.review', $data);
    }
}
