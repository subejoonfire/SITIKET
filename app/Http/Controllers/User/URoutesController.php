<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\Category;
use App\Models\Document;
use App\Models\Priority;
use App\Models\Department;
use App\Models\UserTicket;
use App\Models\UsersTickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class URoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | Dashboard',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'collection' => UsersTickets::with('tickets.messages')->where('iduser', auth()->user()->id)->get(),
            'count' => Ticket::where('iduser', auth()->user()->id)->count(),
        ];
        // dd($data['collection']);
        return view('pages/user/dashboard', $data);
    }

    public function add()
    {

        $data = [
            'title' => 'SI-TIKET | ADD',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'module' => Module::all(),
            'priority' => Priority::all(),
            'category' => Category::all(),
        ];

        return view('pages/user/addrequest', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | Profile',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];

        return view('pages/user/profile', $data);
    }

    public function review($id)
    {
        $message = Message::where([
            'idticket' => $id,
            'read_user' => 0,
        ])->get();
        foreach ($message as $row) {
            $row->read_user = true;
            $row->save();
        }
        $data = [
            'title' => 'SI-TIKET | Review',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'data' => UsersTickets::with(['tickets.priorities', 'pics.users'])
                ->where('idticket', $id)
                ->first(),
            'collection' => Message::with(['documents', 'user_from', 'user_to'])->where('idticket', $id)->orderBy('created_at', 'desc')->get(),
            'documents' => Document::with('messages')
                ->whereHas('messages', function ($query) use ($id) {
                    $query->where('messages.idticket', $id);
                })->get(),
        ];
        return view('pages/user/review', $data);
    }
}
