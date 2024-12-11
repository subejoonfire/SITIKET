<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\UserDepartment;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function userStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|max:5',
            'phone' => 'required|string|max:14',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validated['level'] == 3) {
            $validated = array_merge($validated, $request->validate([
                'idmodule' => 'required|max:5',
            ]));
        }

        User::create([
            'idmodule' => $validated['level'] == 3 ? $validated['idmodule'] : null,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
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
            'idmodule' => 'required|integer',
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
    public function moduleStore(Request $request)
    {
        $request->validate([
            'modulename' => 'required|string|max:255',
        ]);

        Module::create([
            'modulename' => $request->modulename,
        ]);

        return redirect()->to(url('admin/module'))->with('success', 'Modul berhasil ditambahkan.');
    }

    public function moduleDelete($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->to(url('admin/module'))->with('success', 'Modul berhasil dihapus.');
    }

    public function moduleUpdate(Request $request, $id)
    {
        $request->validate([
            'modulename' => 'required|string|max:255',
        ]);

        $module = Module::findOrFail($id);
        $module->update([
            'modulename' => $request->modulename,
        ]);
        return redirect()->to(url('admin/module'))->with('success', 'Modul berhasil diperbarui.');
    }
}
