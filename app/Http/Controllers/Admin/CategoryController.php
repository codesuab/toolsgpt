<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 
    public function index()
    {
        $data = Category::latest()->get();
        return view('admin.category', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $request->id
        ]);

        Category::updateOrCreate(['id' => $request->id], $request->except('id'));

        return back()->with('success', 'Saved success!');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return back()->with('success', 'Delete success!');
    }
}
