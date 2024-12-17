<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\Category;
use App\Models\Document;
use App\Models\Department;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class URoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'collection' => Ticket::where('iduser', auth()->user()->id)->get(),
            'count' => Ticket::where('iduser', auth()->user()->id)->count(),
        ];
        return view('pages/user/dashboard', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'SI-TIKET | ADD',
            'module' => Module::all(),
            'category' => Category::all(),
        ];

        return view('pages/user/addrequest', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | Profile'
        ];

        return view('pages/user/profile', $data);
    }

    public function review($id)
    {
        $data = [
            'title' => 'SI-TIKET | Review',
            'data' => Ticket::where('tickets.id', $id)->first(),
            'collection' => Message::with(['documents', 'user_from', 'user_to'])->where('idticket', $id)->orderBy('created_at', 'desc')->get(),
            'documents' => Document::with('messages')
                ->whereHas('messages', function ($query) use ($id) {
                    $query->where('messages.idticket', $id);
                })->get(),
        ];
        return view('pages/user/review', $data);
    }
}
