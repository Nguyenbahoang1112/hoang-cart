<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //Register
    public function showRegister()
    {
        return view('customer.auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $userShop = User::create([
            'id' => Str::uuid()->toString(),
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect(route('login'));
    }
    //Login
    public function showLogin()
    {
        return view('customer.auth.login');
    }
    public function login(LoginRequest $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/');
        }
        else {
            return redirect('/login')->withErrors(['failLogin'=> 'Login failed!']);
        }
    }
    //Logout
    public function logout() {
        if(Auth::user())
        {
            //Xóa tất cả dữ liệu trong session
            session()->flush();
            //Xóa một key cụ thể 'user'
            session()->forget('user');
        }
        return redirect(route('login'));
    }
}
