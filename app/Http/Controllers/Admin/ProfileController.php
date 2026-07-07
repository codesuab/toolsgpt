<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // index
    public function index()
    {
        return view('admin.profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|mimes:png,jpg,webp',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6'
        ]);

        DB::beginTransaction();
        try {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            if ($request->hasFile('avatar')) {
                // Delete old image
                if ($user->avatar && file_exists(public_path('media/' . $user->avatar))) {
                    unlink(public_path('media/' . $user->avatar));
                }

                // Upload new image
                $file = $request->file('avatar');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('media'), $filename);

                $user->avatar = '/media/' . $filename;
            }
            $user->save();

            DB::commit();
            return back()->with('success', 'Profile updated success!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Invalid request!');
        }
    }
}
