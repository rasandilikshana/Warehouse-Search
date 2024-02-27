<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->role_id === 0 && $user->role_name === 'is_admin') {
                return redirect()->route('dashboard'); // Redirect admin users to the dashboard
            }else if ($user->role_id === 1 && $user->role_name === 'is_editor'){
                return redirect()->route('editor-home');
            }else if ($user->role_id === 2 && $user->role_name === 'is_academic'){
                return redirect()->route('academic-home');
            }else if ($user->role_id === 3 && $user->role_name === 'is_construct'){
                return redirect()->route('construct-home');
            }else if ($user->role_id === 4 && $user->role_name === 'is_allaccess'){
                return redirect()->route('allaccess-home');
            }else if ($user->role_id === 5 && $user->role_name === 'is_academicDev'){
                return redirect()->route('academic-dev-home');
            }else if ($user->role_id === 6 && $user->role_name === 'is_constructDev'){
                return redirect()->route('construct-dev-home');
            }
            return redirect()->route('login'); // Redirect regular users to the dashboard
        }

        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profile()
    {
        return view('profile');
    }
}
