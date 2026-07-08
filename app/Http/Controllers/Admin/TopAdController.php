<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopAd;
use Illuminate\Http\Request;

class TopAdController extends Controller
{
    // index
    public function index()
    {
        $data = TopAd::first();

        return view('admin.topAd', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => "required",
            'link' => 'required|url',
            'link_label' => "required",
            'status' => "required"
        ]);

        $old = TopAd::first();

        TopAd::updateOrCreate(['id' => $old?->id], $request->all());

        return back()->with('success', 'Saved success');
    }
}
