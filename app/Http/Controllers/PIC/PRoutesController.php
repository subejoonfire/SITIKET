<?php

namespace App\Http\Controllers\PIC;

use App\Models\Ticket;
use App\Models\Message;
use App\Models\Document;
use App\Models\Priority;
use App\Models\UsersTickets;
use App\Http\Controllers\Controller;

class PRoutesController extends Controller
{
    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
        ];

        return view('pages/pic/profile', $data);
    }

    public function dashboard()
    {

        $data = [
            'title' => 'BERANDA | SI-TICKET',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'page' => 'beranda',
            'approved' => Ticket::where('status', 'DISETUJUI')->count(),
            'declined' => Ticket::where('status', 'DITOLAK')->count(),
            'processed' => Ticket::where('status', 'DIPROSES')->count(),
            'done' => Ticket::where('status', 'SELESAI')->count(),
        ];

        return view('pages/pic/dashboard', $data);
    }
    public function ticket()
    {
        $data = [
            'title' => 'SI-TIKET | TIKET',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'collection' => Ticket::with([
                'users',
                'messages',
                'modules',
            ])
                ->whereHas('users_tickets', function ($query) {
                    $query->where('iduser_pic', auth()->user()->id);
                })
                ->get()
        ];
        // dd($data['notificationData']);
        return view('pages/pic/ticket/index', $data);
    }

    public function approved()
    {
        $data = [
            'title' => 'SI-TIKET | DISETUJUI',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'collection' => Ticket::with([
                'users',
                'messages',
                'modules',
            ])
                ->whereHas('users_tickets', function ($query) {
                    $query->where([
                        'iduser_pic' => auth()->user()->id,
                        'status' => 'DISETUJUI'
                    ]);
                })
                ->get()
        ];
        return view('pages/pic/ticket/approved', $data);
    }

    public function processed()
    {
        $data = [
            'title' => 'SI-TIKET | DIPROSES',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'collection' => Ticket::with([
                'users',
                'messages',
                'modules',
            ])
                ->whereHas('users_tickets', function ($query) {
                    $query->where([
                        'iduser_pic' => auth()->user()->id,
                        'status' => 'DIPROSES'
                    ]);
                })
                ->get()
        ];
        return view('pages/pic/ticket/processed', $data);
    }

    public function declined()
    {
        $data = [
            'title' => 'SI-TIKET | DITOLAK',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'collection' => Ticket::with([
                'users',
                'messages',
                'modules',
            ])
                ->whereHas('users_tickets', function ($query) {
                    $query->where([
                        'iduser_pic' => auth()->user()->id,
                        'status' => 'DITOLAK'
                    ]);
                })
                ->get()
        ];
        return view('pages/pic/ticket/declined', $data);
    }

    public function done()
    {
        $data = [
            'title' => 'SI-TIKET | SELESAI',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'collection' => Ticket::with([
                'users',
                'messages',
                'modules',
            ])
                ->whereHas('users_tickets', function ($query) {
                    $query->where([
                        'iduser_pic' => auth()->user()->id,
                        'status' => 'SELESAI'
                    ]);
                })
                ->get()
        ];
        return view('pages/pic/ticket/done', $data);
    }
    public function review($type, $id)
    {

        Message::where('idticket', $id)->update(['read_pic' => true]);
        $check_pic = UsersTickets::where('idticket', $id)->get();
        $unique_pics = $check_pic->pluck('iduser_pic')->unique();
        $many = $unique_pics->count() > 1 ? true : false;
        $data = [
            'title' => 'SITIKET | Review',
            'many' => $many,
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'type' => $type,
            'data' => Ticket::with(['categories', 'users.companies', 'users.departments', 'priorities',])->where('id', $id)->first(),
            'collection' => Message::with(['documents'])->where('idticket', $id)->orderBy('created_at', 'desc')->get(),
            'documents' => Document::with('messages')->whereHas('messages', function ($query) use ($id) {
                $query->where('messages.idticket', $id);
            })->get(),
        ];
        if ($type == 'approved') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'processed') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'index') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'done') {
            return view('pages/pic/ticket/review', $data);
        }

        return redirect()->back()->with('error', 'Halaman yang anda cari tidak ditemukan');
    }
}
