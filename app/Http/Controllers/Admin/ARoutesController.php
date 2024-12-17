<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Module;
use App\Models\Category;
use App\Models\Department;
use App\Http\Controllers\Controller;

class ARoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | DASHBOARD',
            'userCount' => User::count(),
            'moduleCount' => Module::count(),
        ];
        return view('pages.admin.dashboard', $data);
    }

    public function user()
    {
        $data = [
            'title' => 'SI-TIKET | USER',
            'user' => User::all(),
        ];
        return view('pages.admin.user.user', $data);
    }

    public function adduser()
    {
        $data = [
            'title' => 'SI-TIKET | Tambah_User',
            'collection' => Module::all(),
        ];
        return view('pages.admin.user.adduser', $data);
    }

    public function edituser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.user')->with('error', 'User tidak ditemukan.');
        }
        $data = [
            'title' => 'SI-TIKET | USER',
            'collection' => Module::all(),
            'user' => $user,
        ];

        return view('pages.admin.user.edituser', $data);
    }
    public function tiket()
    {
        $data = [
            'title' => 'SI-TIKET | Ticket',
            'collection' => Category::all(),
        ];
        return view('pages.admin.tiket.tiket', $data);
    }
    public function category()
    {
        $data = [
            'title' => 'SI-TIKET | CATEGORY',
            'collection' => Category::all(),
        ];
        return view('pages.admin.category.category', $data);
    }

    public function addcategory()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_CATEGORY',
        ];
        return view('pages.admin.category.addcategory', $data);
    }

    public function editcategory($id)
    {
        $data = [
            'title' => 'SI-TIKET | ADD_CATEGORY',
            'data' => Category::find($id),
        ];
        return view('pages.admin.category.editcategory', $data);
    }

    public function depart()
    {
        $data = [
            'title' => 'SI-TIKET | DEPARTMENT',
            'collection' => Department::all(),
        ];
        return view('pages.admin.department.department', $data);
    }
    public function adddepart()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_DEPARTMENT',
        ];
        return view('pages.admin.department.adddepartment', $data);
    }

    public function editdepart()
    {
        // $query = Department::findOrFail();
        $data = [
            'title' => 'SI-TIKET | EDIT_DEPARTMENT',
            // 'name' => $query->departmentname,
            // 'id' => $query->id,
        ];
        return view('pages.admin.department.editdepartment', $data);
    }

    public function company()
    {
        $data = [
            'title' =>'SI-TIKET | PERUSAHAAN',
            // 'collection' => Company::all(),
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

    public function editcompany()
    {
        $data = [
            'title' => 'SI-TIKET | EDIT_COMPANY',
        ];
        return view('pages.admin.company.editcompany', $data);
    }
    public function priority()
    {
        $data = [
            'title' =>'SI-TIKET | PRIORITAS',
            // 'collection' => Company::all(),
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

    public function editpriority()
    {
        $data = [
            'title' => 'SI-TIKET | EDIT_PRIORITAS',
        ];
        return view('pages.admin.priority.editpriority', $data);
    }


    public function module()
    {
        $data = [
            'title' => 'SI-TIKET | DEPARTMENT',
            'module' => Module::all(),
        ];
        return view('pages.admin.module.module', $data);
    }
    public function addmodule()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_MODULE',
        ];
        return view('pages.admin.module.addmodule', $data);
    }
    public function editmodule($id)
    {
        $data = Module::find($id);
        if (!$data) {
            return redirect()->route('admin.module')->with('error', 'Module tidak ditemukan.');
        }
        $data = [
            'title' => 'SI-TIKET | Module',
            'data' => $data,
        ];

        return view('pages.admin.module.editmodule', $data);
    }
}
