<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postLogin(Request $request)
    {
        $credential = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credential)) {
            if (auth()->user()->isAdmin) {
                return redirect(route('admin.index'));
            }

            return redirect(route('game.index'));
        }

        $request->session()->flash('message', 'Invalid email or password!');

        return back()->withInput();
    }

    public function postRegister(Request $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if (! $user) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'user registration failed!'
            ], 400);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'user registration success!'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('auth.login'));
    }
}
