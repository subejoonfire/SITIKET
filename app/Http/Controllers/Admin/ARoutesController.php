<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pic;
use App\Models\User;

class ARoutesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SI-TIKET | DASHBOARD',
            'userCount' => User::count(),
            'picCount' => Pic::count(),
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
            'collection' => Pic::all(),
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
            'collection' => Pic::all(),
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
            'collection' => Pic::all(),
        ];
        return view('pages.admin.pic.pic', $data);
    }

    public function adddepart()
    {
        $data = [
            'title' => 'SI-TIKET | ADD_DEPARTMENT',
        ];
        return view('pages.admin.pic.addpic', $data);
    }

    public function editdepart($id)
    {
        $query = Pic::findOrFail($id);
        $data = [
            'title' => 'SI-TIKET | EDIT_DEPARTMENT',
            'name' => $query->picname,
            'id' => $query->id,
        ];
        return view('pages.admin.pic.editpic', $data);
    }
}
