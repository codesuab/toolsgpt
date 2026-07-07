<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            if (Auth::attempt($request->only('email', 'password'), $request->remember == 'on' ? true : false)) {
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
