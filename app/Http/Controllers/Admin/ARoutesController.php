<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ARoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | DASHBOARD'
        ];
        return view('pages.admin.dashboard', $data);
    }
    
    public function user()
    {
        $data = [
            'title' => 'SI-TIKET | USER'
        ];
        return view('pages.admin.user', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
        ];

        return view('pages.admin.profile', $data);
    }
}
