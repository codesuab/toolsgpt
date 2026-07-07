<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Policy;
use App\Models\Trams;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // about
    public function about()
    {
        $data = About::first();
        return view('admin.pages.about', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'short' => 'required'
        ]);

        $old = About::first();

        About::updateOrCreate(['id' => $old?->id], $request->all());

        return back()->with('success', 'Updated success');
    }

    // trams
    public function trams()
    {
        $data = Trams::first();
        return view('admin.pages.trams', ['data' => $data]);
    }
    public function tramsStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'short' => 'required'
        ]);

        $old = Trams::first();

        Trams::updateOrCreate(['id' => $old?->id], $request->all());

        return back()->with('success', 'Updated success');
    }


    // policy
    public function policy()
    {
        $data = Policy::first();
        return view('admin.pages.policy', ['data' => $data]);
    }
    public function policyStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $old = Policy::first();

        Policy::updateOrCreate(['id' => $old?->id], $request->all());

        return back()->with('success', 'Updated success');
    }
}
