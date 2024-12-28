<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return view('Admin.dashboard.index');
    }
    public function showLogin()
    {
        return view('Customer.Auth.admin_login');
    }
    public function login(Request $request)
    {
        // dd(Auth::getRequest());
        if(Auth::guard('admin')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return redirect('/admin/home')->with('success', 'Login successful!');
        }
        else {
            return redirect('/admin/login')->with('error', 'Login failed!');
        }
    }
}
