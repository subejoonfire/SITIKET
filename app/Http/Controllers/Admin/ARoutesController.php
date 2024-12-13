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
            'collection' => Department::all(),
            'user' => $user,
        ];

        return view('pages.admin.user.edituser', $data);
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

    public function editdepart($id)
    {
        $query = Department::findOrFail($id);
        $data = [
            'title' => 'SI-TIKET | EDIT_DEPARTMENT',
            'name' => $query->departmentname,
            'id' => $query->id,
        ];
        return view('pages.admin.department.editdepartment', $data);
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
