<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'SI-TIKET | Dashboard'
        ];

        return view('pages.user.dashboard', $data);
    }

    public function add_request()
    {

        $data = [
            'title' => 'SI-TIKET | ADD_REQUEST'
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
}
