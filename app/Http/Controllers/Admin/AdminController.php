<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\UserDepartment;

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
                'iddepartment' => 'required|max:5',
            ]));
        }

        User::create([
            'iddepartment' => $validated['level'] == 3 ? $validated['iddepartment'] : null,
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
            'iddepartment' => 'required|integer',
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
    public function departmentStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Department::create([
            'departmentname' => $request->name,
        ]);

        return redirect()->to(url('admin/department'))->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function departmentDelete($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->back()->with('success', 'Departemen berhasil dihapus.');
    }

    public function departmentUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'departmentname' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Departemen berhasil diperbarui.');
    }
}
