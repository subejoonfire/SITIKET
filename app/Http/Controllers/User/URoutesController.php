<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Pic;
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
            'collection' => Ticket::with(['users', 'pics'])->get(),
            'count' => Ticket::count(),
        ];
        return view('pages.user.dashboard', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'SI-TIKET | ADD',
            'collection' => Pic::all(),
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

    public function review()
    {

        $data = [
            'title' => 'SI-TIKET | Review'
        ];

        return view('pages.user.review', $data);
    }
}
