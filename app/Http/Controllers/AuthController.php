<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register_auth()
    {
        return view('admin.auth.register');
    }
    public function register(Request $request)
    {
        $this->validation($request);
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->admin_phone = $data['admin_phone'];
        $admin->save();
        return redirect('/admin')->with('message', 'Register Success');
    }
    public function validation(Request $request)
    {
        $request->validate([
            'admin_name' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
            'admin_phone' => 'required|min:10|max:13',
        ]);
    }
    public function login_auth()
    {
        return view('admin.auth.login');
    }
    public function logout_auth()
    {
        Auth::logout();
        return redirect('/login-auth');
    }
    public function login(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
        $data = $request->all();
        if (Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])) {
            return redirect('/dashboard');
        } else {
            return redirect('/login-auth')->with('message', 'Email or Password is wrong');
        }
    }
}
