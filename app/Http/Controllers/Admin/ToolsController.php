<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ToolsController extends Controller
{
    // index
    public function index()
    {
        $data = Tool::with('category')->latest()->get();

        return view('admin.tools.index', [
            'data' => $data
        ]);
    }

    public function add(Request $request)
    {
        $views = collect(File::files(resource_path('views/tools')))
            ->map(function ($file) {
                return pathinfo($file->getFilename(), PATHINFO_FILENAME);
            })
            ->values();


        $data = null;
        if (isset($request->id) && !empty($request->id)) {
            $data = Tool::find($request->id);

            if (!$data) {
                return back()->with('error', 'Tool not found!');
            }
        }

        return view('admin.tools.add', [
            'views' => $views,
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => "required",
            'view' => 'required|unique:tools,view,' . $request->id,
            'name' => "required",
            'taq_line' => "required",
            'slug' => "required|unique:tools,slug," . $request->id,
            'title' => "required",
            'short_title' => "required",
            'content' => 'required',
            'icon' => 'required',
            'color' => 'required',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'badge' => 'nullable',
        ]);

        $category = Category::find((int)$request->category_id);

        // step and faq
        $faq = collect($request->faq_question)
            ->map(function ($question, $index) use ($request) {
                return [
                    'question' => $question,
                    'answer' => $request->faq_answer[$index] ?? '',
                ];
            })
            ->filter(fn($item) => filled($item['question']) || filled($item['answer']))
            ->values()
            ->toArray();

        $data = $request->except('faq_question', 'faq_answer');
        $data['faq'] = $faq;
        $data['cat_slug'] = $category->slug;

        Tool::updateOrCreate(['id' => $request->id], $data);

        return back()->with('success', "Tool saved success.");
    }

    public function destroy($id)
    {
        Tool::find($id)->delete();

        return back()->with('success', 'Delete success');
    }
}
