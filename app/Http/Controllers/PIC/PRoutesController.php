<?php

namespace App\Http\Controllers\PIC;

use App\Models\Ticket;
use App\Models\Message;
use App\Models\Document;
use App\Models\Followup;
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
            'collection' => UsersTickets::with([
                'tickets.messages',
                'tickets.modules',
                'tickets.followups',
                'users',
            ])
                ->whereHas('pics', function ($query) {
                    $query->where('pics.iduser_pic', auth()->user()->id);
                })
                ->get()
        ];
        return view('pages/pic/ticket/index', $data);
    }

    public function approved()
    {
        $data = [
            'title' => 'SI-TIKET | DISETUJUI',
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
            'collection' => UsersTickets::with([
                'tickets.messages',
                'tickets.modules',
                'tickets.followups',
                'users',
            ])
                ->whereHas('pics', function ($query) {
                    ([
                        $query->where([
                            'pics.iduser_pic' => auth()->user()->id,
                        ]),
                    ]);
                })
                ->whereHas('tickets', function ($query) {
                    $query->where('status', 'DISETUJUI');
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
            'collection' => UsersTickets::with([
                'tickets.messages',
                'tickets.modules',
                'tickets.followups',
                'users',
            ])
                ->whereHas('pics', function ($query) {
                    ([
                        $query->where([
                            'pics.iduser_pic' => auth()->user()->id,
                        ]),
                    ]);
                })
                ->whereHas('tickets', function ($query) {
                    $query->where('status', 'DIPROSES');
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
            'collection' => UsersTickets::with([
                'tickets.messages',
                'tickets.modules',
                'tickets.followups',
                'users',
            ])
                ->whereHas('pics', function ($query) {
                    ([
                        $query->where([
                            'pics.iduser_pic' => auth()->user()->id,
                        ]),
                    ]);
                })
                ->whereHas('tickets', function ($query) {
                    $query->where('status', 'DITOLAK');
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
            'collection' => UsersTickets::with([
                'tickets.messages',
                'tickets.modules',
                'tickets.followups',
                'users',
            ])
                ->whereHas('pics', function ($query) {
                    ([
                        $query->where([
                            'pics.iduser_pic' => auth()->user()->id,
                        ]),
                    ]);
                })
                ->whereHas('tickets', function ($query) {
                    $query->where('status', 'SELESAI');
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
            'data' => UsersTickets::with([
                'tickets.categories',
                'tickets.followups',
                'users.companies',
                'users.departments',
                'tickets.priorities',
                'tickets.messages.documents',
            ])->where('id', $id)->first(),
            'collection' => Message::with(['documents', 'user_from', 'user_to'])->where('idticket', $id)->orderBy('created_at', 'desc')->get(),
            'documents' => Document::with('messages')->whereHas('messages', function ($query) use ($id) {
                $query->where('messages.idticket', $id);
            })->get(),
        ];
        if ($type == 'approved') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'processed') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'declined') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'index') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'done') {
            return view('pages/pic/ticket/review', $data);
        } elseif ($type == 'followup') {
            return view('pages/pic/ticket/review', $data);
        }

        return redirect()->back()->with('error', 'Halaman yang anda cari tidak ditemukan');
    }
    public function followup()
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'collection' => Followup::with('tickets', 'users')->get(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        return view('pages/pic/followup/index', $data);
    }
    public function followup_waiting()
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'collection' => Followup::with('tickets', 'users')->where('status', 0)->get(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        return view('pages/pic/followup/waiting', $data);
    }
    public function followup_done()
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'collection' => Followup::with('tickets', 'users')->where('status', 1)->get(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        return view('pages/pic/followup/done', $data);
    }
    public function followupdetail($id)
    {
        $data = [
            'title' => 'SITIKET | Tindak Lanjut',
            'data' => UsersTickets::with([
                'tickets.categories',
                'users.companies',
                'users.departments',
                'tickets.followups',
                'tickets.modules',
            ])->where('id', $id)->first(),
            'notification' => $this->notification,
            'notificationData' => $this->notificationData,
        ];
        return view('pages/pic/followup/detail', $data);
    }
}
