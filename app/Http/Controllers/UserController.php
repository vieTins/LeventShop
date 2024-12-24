<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $admin = Admin::with('roles')->orderBy('admin_id', 'DESC')->paginate(5);
        return view('admin.users.all_users')->with(compact('admin'));
    }
    public function add_user()
    {
        return view('admin.users.add_user');
    }
    public function assign_roles(Request $request)
    {
        $data = $request->all();
        $user = Admin::where('admin_email', $data['admin_email'])->first();
        $user->roles()->detach();  // xóa vai trò hiện tại 
        if ($request['author_role']) {
            $user->roles()->attach(Roles::where('name', 'staff')->first());
        }
        if ($request['user_role']) {
            $user->roles()->attach(Roles::where('name', 'manager')->first());
        }
        if ($request['admin_role']) {
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        return redirect()->back();
    }
    public function delete_user_roles($admin_id)
    {
        if (Auth::id() == $admin_id) {
            return redirect()->back()->with('message', 'You cannot delete your own role');
        } else {
            $admin = Admin::find($admin_id);
            if ($admin) {
                $admin->roles()->detach();
                $admin->delete();
                return redirect()->back()->with('message', 'User deleted successfully');
            }
        }
    }
}
