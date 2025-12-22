<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class AuthController extends Controller
{
    public function adminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminCheckLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if (!$admin) {
            return back()->with('error', 'No account found with that email address.');
        }

        if (Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard.index')->with('success', 'Welcome!');
        }

        return back()->with('error', 'Incorrect password.');
    }

    public function Logout(Request $request)
    {
        $guards=['admin','web'];
        foreach($guards as $guard){
        Auth::guard($guard)->logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }


    public function userLogin()
    {
        return view('auth.user-login');
    }

    public function userRegister()
    {
        return view('auth.user-register');
    }

    public function userStoreRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('user.books.index')->with('success', 'Account created successfully.');
    }

    public function userCheckLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->with('error', 'No account found with that email address.');
        }

        if (Hash::check($credentials['password'], $user->password)) {
            Auth::guard('web')->login($user);
            return redirect()->route('user.books.index')->with('success', 'Welcome!');
        }

        return back()->with('error', 'Incorrect password.');
    }
}
