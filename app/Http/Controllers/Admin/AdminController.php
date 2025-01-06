<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\Company;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\UserDepartment;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function userStore(Request $request)
    {
        $validated = $request->validate([
            'iddepartment' => 'nullable|integer',
            'idcompany' => 'nullable|integer',
            'idmodule' => 'nullable|integer',
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
            'iddepartment' => $validated['iddepartment'],
            'idcompany' => $validated['idcompany'],
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
            'idcompany' => 'nullable|integer',
            'iddepartment' => 'nullable|integer',
            'idmodule' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'level' => 'required|integer|max:5',
            'phone' => 'required|string|max:16',
            'email' => 'required|email|unique:users,email,' . $request->id,
        ]);
        $user = User::findOrFail($id);
        if ($user->email != $request->email) {
            $user->email_verified_at = NULL;
        }
        if (empty($request->password)) {
            $user->idcompany = $validated['idcompany'] ?? NULL;
            $user->iddepartment = $validated['iddepartment'] ?? NULL;
            $user->idmodule = $validated['idmodule'] ?? NULL;
            $user->name = $validated['name'];
            $user->level = $validated['level'];
            $user->phone = $validated['phone'];
            $user->email = $validated['email'];
        } else {
            $user->email_verified_at = NULL;
            $user->phone_verified_at = NULL;
            $user->idcompany = $validated['idcompany'] ?? NULL;
            $user->iddepartment = $validated['iddepartment'] ?? NULL;
            $user->idmodule = $validated['idmodule'] ?? NULL;
            $user->name = $validated['name'];
            $user->level = $validated['level'];
            $user->phone = $validated['phone'];
            $user->email = $validated['email'];
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui!');
    }
    public function departmentStore(Request $request)
    {
        $request->validate([
            'departmentname' => 'required|string|max:255',
        ]);

        Department::create([
            'departmentname' => $request->departmentname,
        ]);

        return redirect()->to(url('admin/department'))->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function departmentDelete($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();
            return redirect()->back()->with('success', 'Departemen berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Departemen gagal dihapus.');
        }
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

        return redirect()->to(url('admin/module'))->with('success', 'Modul berhasil ditambahkan');
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
    public function categoryStore(Request $request)
    {
        $request->validate([
            'categoryname' => 'required|string|max:255',
        ]);
        Category::create([
            'categoryname' => $request->categoryname,
        ]);
        return redirect()->to(url('admin/category'))->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'categoryname' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'categoryname' => $request->categoryname,
        ]);
        return redirect()->to(url('admin/category'))->with('success', 'Kategori berhasil diperbarui.');
    }
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->to(url('admin/category'))->with('success', 'Kategori berhasil dihapus.');
    }

    public function priorityStore(Request $request)
    {
        $request->validate([
            'priorityname' => 'required|string|max:255',
        ]);
        Priority::create([
            'priorityname' => $request->priorityname,
        ]);
        return redirect()->to(url('admin/priority'))->with('success', 'Prioritas berhasil ditambahkan.');
    }
    public function priorityUpdate(Request $request, $id)
    {
        $request->validate([
            'priorityname' => 'required|string|max:255',
        ]);
        $priority = Priority::findOrFail($id);
        $priority->update([
            'priorityname' => $request->priorityname,
        ]);
        return redirect()->to(url('admin/priority'))->with('success', 'Prioritas berhasil diperbarui.');
    }
    public function priorityDelete($id)
    {
        $priority = Priority::findOrFail($id);
        $priority->delete();

        return redirect()->to(url('admin/priority'))->with('success', 'Prioritas berhasil dihapus.');
    }
    public function companyStore(Request $request)
    {
        $request->validate([
            'companyname' => 'required|string|max:255',
            'companycode' => 'required|string|max:255',
        ]);
        Company::create([
            'companyname' => $request->companyname,
            'companycode' => $request->companycode,
        ]);
        return redirect()->to(url('admin/company'))->with('success', 'Perusahaan berhasil ditambahkan.');
    }
    public function companyUpdate(Request $request, $id)
    {
        $request->validate([
            'companyname' => 'required|string|max:255',
            'companycode' => 'required|string|max:255',
        ]);
        $company = Company::findOrFail($id);
        $company->update([
            'companyname' => $request->companyname,
            'companycode' => $request->companycode,
        ]);
        return redirect()->to(url('admin/company'))->with('success', 'Perusahaan berhasil diperbarui.');
    }
    public function companyDelete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->to(url('admin/company'))->with('success', 'Perusahaan berhasil dihapus.');
    }
}
