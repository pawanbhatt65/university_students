<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // sign-up
    public function signUp()
    {
        return view('admin/signUp');
    }
    // store-admin
    public function storeAdmin(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|same:confirm_password',
            'confirm_password' => 'required',
        ];
        $request->validate($rules);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $check_user = User::where('email', '=', $email)->first();
        if ($check_user) {
            Alert::info('Important', 'User already registered with us!');
            return redirect()->back();
        }

        $new_user = new User;
        $new_user->name = $name;
        $new_user->email = $email;
        $new_user->password = $password;

        $new_user->save();

        Alert::success('Success', 'User successfully registered with us!');
        return redirect()->route('login');
    }

    // admin login page
    public function login()
    {
        return view('admin.login');
    }

    // admin login functionality
    public function loginAdmin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $request->validate($rules);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        } else {
            Alert::info('Important', 'Wrong credentials!');
            return redirect()->back();
        }
    }

    // dashboard page
    public function dashboard()
    {
        if (Auth::check()) {
            Alert::success('Success', 'Login successfully!');
            return view('admin/dashboard');
        } else {
            Alert::info('Important', 'Please login first!');
            return redirect()->route('login');
        }
    }

    // admin logout
    public function logout()
    {
        Auth::logout();
        Alert::info('Important', 'Logged out successfully!');
        return redirect()->route('homepage');
    }
}
