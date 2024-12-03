<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;

class ARoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | DASHBOARD',
            'userCount' => User::count(),
            'departmentCount' => Department::count(),
        ];
        return view('pages.admin.dashboard', $data);
    }

    public function profile()
    {

        $data = [
            'title' => 'SI-TIKET | PROFILE',
        ];

        return view('pages.admin.profile', $data);
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
            'collection' => Department::all(),
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
            'user' => $user,
        ];

        return view('pages.admin.user.edituser', $data);
    }

    public function category()
    {
        $data = [
            'title' => 'SI-TIKET | CATEGORY',
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

    public function editcategory()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_CATEGORY',
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
}
