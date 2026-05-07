<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('appointment.index');
        }

        return back()->with('error', 'Password is not match our records');

    }

    public function signupAccount(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],

        ]);

        try {
            // code...
            DB::beginTransaction();

            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                // 'password'=>Hash::make($request->password)
                'password' => $request->password,
            ]);

            $newUser->roles()->attach([1, 4]);

            Mail::to($newUser->email)->queue(new WelcomeMail($newUser));


            DB::commit();

        } catch (\Throwable $th) {
            // throw $th;
            Log::debug('create account',[$th->getMessage()]);

            DB::rollBack();
        }

        return redirect()->route('home')
            ->with('success', 'Account created successfully, you can log in right now');

    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');

    }
}
