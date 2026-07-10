<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MegaMenu;
use App\Models\Tool;
use Illuminate\Http\Request;

class MegaMenuController extends Controller
{
    // index
    public function index()
    {

        $oldMenu = MegaMenu::pluck('tool_id')->toArray();

        $data = MegaMenu::latest()
            ->with('tool')
            ->get();


        $tool = Tool::latest()->whereNotIn('id', $oldMenu)->get();
        return view('admin.megamenu', ['data' => $data, 'tool' => $tool]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'col' => 'required',
            'status' => "required",
            'tool_id' => 'required'
        ]);

        MegaMenu::updateOrCreate(['id' => $request?->id], $request->except('id'));

        return back()->with('success', 'Saved success!');
    }

    public function destroy($id)
    {
        MegaMenu::find($id)->delete();
        return back()->with('success', 'Delete success!');
    }
}
