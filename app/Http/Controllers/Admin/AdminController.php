<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Store a new user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'iddepartment' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->iddepartment = $validated['iddepartment'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();
        return redirect()->to(url('admin/user'))->with('success', 'User berhasil ditambahkan!');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'iddepartment' => 'required|integer',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($validated['id']);
        $user->name = $validated['name'];
        $user->iddepartment = $validated['iddepartment'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui!');
    }
}
