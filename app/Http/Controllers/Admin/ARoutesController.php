<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Company;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\UsersTickets;

class ARoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | DASHBOARD',
            'userCount' => User::count(),
            'moduleCount' => Module::count(),
        ];
        return view('pages/admin/dashboard', $data);
    }

    public function user()
    {
        $data = [
            'title' => 'SI-TIKET | USER',
            'collection' => User::with(['modules', 'companies', 'departments'])->get(),
        ];
        // dd($data['collection']);
        return view('pages/admin/user/user', $data);
    }

    public function adduser()
    {
        $data = [
            'title' => 'SI-TIKET | Tambah_User',
            'modules' => Module::all(),
            'departments' => Department::all(),
            'companies' => Company::all(),
        ];
        return view('pages/admin/user/adduser', $data);
    }

    public function edituser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin/user')->with('error', 'User tidak ditemukan.');
        }
        $data = [
            'title' => 'SI-TIKET | USER',
            'modules' => Module::all(),
            'departments' => Department::all(),
            'companies' => Company::all(),
            'data' => $user,
        ];

        return view('pages/admin/user/edituser', $data);
    }
    public function ticket()
    {
        $data = [
            'title' => 'SI-TIKET | Ticket',
            'collection' => UsersTickets::with(['tickets.modules', 'users'])->get(),
        ];
        return view('pages.admin.ticket.ticket', $data);
    }
    public function ticket_review($id)
    {
        $data = [
            'title' => 'SI-TIKET | Ticket',
            'data' => UsersTickets::with(['users', 'tickets.modules', 'tickets.categories', 'tickets.priorities'])->where('id', $id)->first(),
        ];
        return view('pages.admin.ticket.review', $data);
    }
    public function ticket_approved()
    {
        $data = [
            'title' => 'SI-TIKET | DISETUJUI',
            'collection' => Ticket::with(['users', 'modules'])->where('status', 'DISETUJUI')->get(),
        ];
        return view('pages.admin.ticket.approved', $data);
    }

    public function ticket_processed()
    {
        $data = [
            'title' => 'SI-TIKET | DIPROSES',
            'collection' => Ticket::with(['users', 'modules'])->where('status', 'DIPROSES')->get(),
        ];
        return view('pages.admin.ticket.processed', $data);
    }

    public function ticket_declined()
    {
        $data = [
            'title' => 'SI-TIKET | DITOLAK',
            'collection' => Ticket::with(['users', 'modules'])->where('status', 'DITOLAK')->get(),
        ];
        return view('pages.admin.ticket.declined', $data);
    }

    public function ticket_done()
    {
        $data = [
            'title' => 'SI-TIKET | SELESAI',
            'collection' => Ticket::with(['users', 'modules'])->where('status', 'SELESAI')->get(),
        ];
        return view('pages.admin.ticket.done', $data);
    }

    public function category()
    {
        $data = [
            'title' => 'SI-TIKET | CATEGORY',
            'collection' => Category::all(),
        ];
        return view('pages/admin/category/category', $data);
    }

    public function addcategory()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_CATEGORY',
        ];
        return view('pages/admin/category/addcategory', $data);
    }

    public function editcategory($id)
    {
        $data = [
            'title' => 'SI-TIKET | ADD_CATEGORY',
            'data' => Category::find($id),
        ];
        return view('pages/admin/category/editcategory', $data);
    }

    public function depart()
    {
        $data = [
            'title' => 'SI-TIKET | DEPARTMENT',
            'collection' => Department::get(),
        ];
        return view('pages/admin/department/department', $data);
    }
    public function adddepart()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_DEPARTMENT',
            'companies' => Company::all(),
        ];
        return view('pages/admin/department/adddepartment', $data);
    }

    public function editdepart($id)
    {
        $data = [
            'title' => 'SI-TIKET | EDIT_DEPARTMENT',
            'data' => Department::find($id),
            'companies' => Company::all(),
        ];
        return view('pages/admin/department/editdepartment', $data);
    }

    public function company()
    {
        $data = [
            'title' => 'SI-TIKET | PERUSAHAAN',
            'collection' => Company::all(),
        ];
        return view('pages.admin.company.company', $data);
    }

    public function addcompany()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_COMPANY',
        ];
        return view('pages.admin.company.addcompany', $data);
    }

    public function editcompany($id)
    {
        $data = [
            'title' => 'SI-TIKET | EDIT_COMPANY',
            'data' => Company::find($id),
        ];
        return view('pages.admin.company.editcompany', $data);
    }
    public function priority()
    {
        $data = [
            'title' => 'SI-TIKET | PRIORITAS',
            'collection' => Priority::all(),
        ];
        return view('pages.admin.priority.priority', $data);
    }

    public function addpriority()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_PRIORITAS',
        ];
        return view('pages.admin.priority.addpriority', $data);
    }

    public function editpriority($id)
    {
        $data = [
            'title' => 'SI-TIKET | EDIT_PRIORITAS',
            'data' => Priority::find($id),
        ];
        return view('pages.admin.priority.editpriority', $data);
    }


    public function module()
    {
        $data = [
            'title' => 'SI-TIKET | DEPARTMENT',
            'module' => Module::all(),
        ];
        return view('pages/admin/module/module', $data);
    }
    public function addmodule()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_MODULE',
        ];
        return view('pages/admin/module/addmodule', $data);
    }
    public function editmodule($id)
    {
        $data = Module::find($id);
        if (!$data) {
            return redirect()->route('admin/module')->with('error', 'Module tidak ditemukan.');
        }
        $data = [
            'title' => 'SI-TIKET | Module',
            'data' => $data,
        ];

        return view('pages/admin/module/editmodule', $data);
    }

    public function ladmin()
    {
        $data = [
            'title' => 'SI-TIKET | USER-ADMIN',
            'user' => User::with('companies')->where('level', 1)->get(),
        ];
        return view('pages.admin.user.level.admin', $data);
    }
    public function luser()
    {
        $data = [
            'title' => 'SI-TIKET | Level_USER',
            'user' => User::with('companies')->where('level', 4)->get(),
        ];
        return view('pages.admin.user.level.user', $data);
    }

    public function lpic()
    {
        $data = [
            'title' => 'SI-TIKET | Level_USER',
            'user' => User::with('companies')->where('level', 3)->get(),
        ];
        return view('pages.admin.user.level.pic', $data);
    }

    public function lhelpdesk()
    {
        $data = [
            'title' => 'SI-TIKET | Level_USER',
            'user' => User::with('companies')->where('level', 2)->get(),
        ];
        return view('pages.admin.user.level.helpdesk', $data);
    }
}
