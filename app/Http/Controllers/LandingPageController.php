<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function landing()
    {

        $data = [
            'title' => 'BERANDA | SI-TICKET',
            'page' => 'beranda',
        ];

        return view('pages.landing', $data);
    }
}
