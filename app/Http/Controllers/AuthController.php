<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Notification;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            Notification::create([
                'user_id' => $user->id,
                'notification' => 'Pengguna melakukan login',
            ]);

            if ($user->role == 'admin') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('vote');
            }
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Notification::create([
            'user_id' => $user->id,
            'notification' => 'Pengguna melakukan pendaftaran',
        ]);

        Auth::login($user);

        if ($user->role == 'admin') {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->intended('vote');
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        Notification::create([
            'user_id' => $user->id,
            'notification' => 'Pengguna melakukan logout',
        ]);

        return redirect('/');
    }
}
