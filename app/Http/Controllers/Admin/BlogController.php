<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    // index
    public function index()
    {

        $data = Blog::latest()->get();

        return view('admin.blog', ['data' => $data]);
    }

    public function add(Request $request)
    {
        $data = null;
        if (isset($request->id) && !empty($request->id)) {
            $data = Blog::find($request->id);

            if (!$data) {
                return back()->with('error', 'Blog not found!');
            }
        }

        return view('admin.add-blog', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1',
            'slug' => 'required|unique:blogs,slug,' . $request->id,
            'excerpt' => 'required',
            'content' => 'required',
            'status' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable'
        ]);

        DB::beginTransaction();
        try {
            Blog::updateOrCreate(['id' => $request->id], $request->except('id'));

            DB::commit();
            return to_route('ux.blog')->with('success', 'Blog created success');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Invalid request!');
        }
    }

    public function destroy($id)
    {
        Blog::find($id)->delete();

        return back()->with('success', 'One blog delete success');
    }
}
