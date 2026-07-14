<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Tool;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    // index
    public function index()
    {
        $data = Footer::latest()
            ->with('tool')
            ->get();


        $tool = Tool::latest()->get();
        return view('admin.footermenu', ['data' => $data, 'tool' => $tool]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'col' => 'required',
            'status' => "required",
            'tool_id' => 'required'
        ]);

        Footer::updateOrCreate(['id' => $request?->id], $request->except('id'));

        return back()->with('success', 'Saved success!');
    }

    public function destroy($id)
    {
        Footer::find($id)->delete();
        return back()->with('success', 'Delete success!');
    }
}
