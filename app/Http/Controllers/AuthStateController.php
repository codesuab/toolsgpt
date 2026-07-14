<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthStateController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'authenticated' => Auth::check(),
            'user' => Auth::check()
                ? [
                    'id' => Auth::id(),
                    'name' => Auth::user()->name,
                ]
                : null,
        ]);
    }
}
