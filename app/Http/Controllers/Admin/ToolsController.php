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
        $oldTools = Tool::pluck('view')
            ->map(fn($item) => str_replace('.blade', '', $item))
            ->toArray();

        $views = collect(File::files(resource_path('views/tools')))
            ->map(function ($file) {
                return str_replace('.blade', '', pathinfo($file->getFilename(), PATHINFO_FILENAME));
            })
            ->diff($oldTools)
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
            'step_title' => "required",
            'step_sub_title' => "required",
            'content' => 'required',
            'icon' => 'required',
            'color' => 'required',
            'status' => 'required',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'badge' => 'nullable',
            'cat_slug' => 'nullable',
        ]);

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

        $step = collect($request->work_step_title)
            ->map(function ($question, $index) use ($request) {
                return [
                    'title' => $question,
                    'message' => $request->work_step_message[$index] ?? '',
                ];
            })
            ->filter(fn($item) => filled($item['title']) || filled($item['message']))
            ->values()
            ->toArray();

        $data = $request->except('work_step_title', 'work_step_message', 'faq_question', 'faq_answer');

        $data['step'] = $step;
        $data['faq'] = $faq;


        Tool::updateOrCreate(['id' => $request->id], $data);

        return back()->with('success', "Tool saved success.");
    }

    public function destroy($id)
    {
        Tool::find($id)->delete();

        return back()->with('success', 'Delete success');
    }
}
