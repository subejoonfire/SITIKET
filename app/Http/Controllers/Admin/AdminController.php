<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Pic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\UserPic;

class AdminController extends Controller
{
    public function userStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|max:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validated['level'] == 3) {
            $validated = array_merge($validated, $request->validate([
                'idpic' => 'required|max:5',
            ]));
        }

        User::create([
            'idpic' => $validated['level'] == 3 ? $validated['idpic'] : null,
            'name' => $validated['name'],
            'level' => $validated['level'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->to(url('admin/user'))->with('success', 'User berhasil ditambahkan!');
    }


    public function userDelete($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }

    public function userUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|max:5',
            'idpic' => 'required|integer',
            'email' => 'required|email|unique:users,email,' . $request->id,
        ]);
        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->level = $validated['level'];
        $user->email = $validated['email'];
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui!');
    }
    public function picStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Pic::create([
            'picname' => $request->name,
        ]);

        return redirect()->to(url('admin/pic'))->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function picDelete($id)
    {
        $pic = Pic::findOrFail($id);
        $pic->delete();

        return redirect()->back()->with('success', 'Departemen berhasil dihapus.');
    }

    public function picUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pic = Pic::findOrFail($id);
        $pic->update([
            'picname' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Departemen berhasil diperbarui.');
    }
}
