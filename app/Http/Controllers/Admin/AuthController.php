<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // index
    public function login()
    {
        return view('admin.auth.login');
    }

    // logic
    public function loginLogic(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        DB::beginTransaction();
        try {
            $exist = User::where('email', $request->email)->first();

            if (!$exist) {
                DB::rollBack();
                return back()->with('error', 'Invalid login details!');
            }

            // check admin or not
            if ($exist->role !== 'admin') {
                DB::rollBack();
                return back()->with('error', 'Your are not valid admin!');
            }

            if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {

                $request->session()->regenerate();

                $user = Auth::user();

                // Previous session delete
                if ($user->session_id) {
                    Session::getHandler()->destroy($user->session_id);
                }

                // Save new session id
                $user->update([
                    'session_id' => $request->session()->getId(),
                ]);

                DB::commit();

                return to_route('home');
            } else {
                DB::rollBack();
                return back()->with('error', 'Invalid login details!')->withInput();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Invalid request');
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}
