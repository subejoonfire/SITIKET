<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ARoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | DASHBOARD',
            'userCount' => User::count(),
            // 'categoryCount' => Category::count(),
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
            // 'user' => User::whereNotNull('iddepartment')->get(),
        ];
        return view('pages.admin.user.user', $data);
    }

    public function edit_user($id)
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

    public function adduser()
    {
        $data = [
            'title' => 'SI-TIKET | Tambah_User',
            'user' => User::all(),
            // 'user' => User::whereNotNull('iddepartment')->get(),
        ];
        return view('pages.admin.user.adduser', $data);
    }

    public function category()
    {
        $data = [
            'title' => 'SI-TIKET | CATEGORY',
            'userCount' => User::count(),
        ];
        return view('pages.admin.category.category', $data);
    }

    public function addcategory()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_CATEGORY',
            'userCount' => User::count(),
        ];
        return view('pages.admin.category.addcategory', $data);
    }

    public function editcategory()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_CATEGORY',
            'userCount' => User::count(),
        ];
        return view('pages.admin.category.editcategory', $data);
    }
}
