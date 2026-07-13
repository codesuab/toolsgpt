<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Policy;
use App\Models\Tool;
use App\Models\Trams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    // home
    public function home()
    {
        $tools = Tool::with('category')
            ->where('status', 'active')
            ->orderByDesc('usages')
            ->orderByRaw("
                CASE badge
                    WHEN '#1 tool' THEN 1
                    WHEN 'featured' THEN 2
                    WHEN 'trending' THEN 3
                    WHEN 'popular' THEN 4
                    WHEN 'most used' THEN 5
                    WHEN 'top rated' THEN 6
                    WHEN 'new' THEN 7
                    ELSE 8
                END
            ")
            ->take(20)
            ->get();

        return view('home', [
            'tools' => $tools,
        ]);
    }

    // all tools 
    public function allTool(Request $request)
    {

        $filterCat = Category::find(request('cat'));

        $tools = Tool::with('category')
            ->when(request('cat'), function ($query) {
                $query->where('category_id', request('cat'));
            })
            ->orderByDesc('usages')
            ->orderByRaw("
                CASE badge
                    WHEN '#1 tool' THEN 1
                    WHEN 'featured' THEN 2
                    WHEN 'trending' THEN 3
                    WHEN 'popular' THEN 4
                    WHEN 'most used' THEN 5
                    WHEN 'top rated' THEN 6
                    WHEN 'new' THEN 7
                    ELSE 8
                END
            ")
            ->where('status', 'active')
            ->paginate(20);

        return view('all-tools', [
            'tools' => $tools,
            'filter' => $filterCat
        ]);
    }
    public function toolView($slug)
    {
        $data = Tool::where('slug', $slug)
            ->with('category')
            ->where('status', 'active')
            ->first();
        if (!$data) {
            return back();
        }

        $include = 'tools.' . str_replace('.blade', '', $data->view);

        return view('tool-detail', [
            'data' => $data,
            'include' => $include
        ]);
    }

    // about
    public function about()
    {
        $data = About::first();
        return view('about', ['data' => $data]);
    }

    // contact 
    public function contact()
    {
        return view('contact');
    }
    public function contactRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:5'
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Thank you for contacting us. We have received your message and will get back to you as soon as possible.');
    }

    // privacy policy
    public function privacyPolicy()
    {
        $data = Policy::first();
        return view('privacy-policy', ['data' => $data]);
    }

    // terms
    public function terms()
    {
        $data = Trams::first();
        return view('terms-of-service', ['data' => $data]);
    }

    // blog 
    public function blog()
    {
        $data = Blog::latest()->where('status', 'published')->paginate(20);
        return view('blog.index', [
            'data' => $data
        ]);
    }
    public function blogView($slug)
    {
        $data = Blog::where('slug', $slug)->first();
        if (!$data) {
            return back();
        }
        if (!Auth::check()) {
            $data->views += 1;
            $data->save();
        }

        return view('blog.show', ['data' => $data]);
    }

    // update usages
    public function updateUsages(Request $request)
    {
        $data = Tool::where('slug', $request->input('slug'))->first();

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Tool not found'
            ], 404);
        }

        $data->increment('usages');

        return response()->json([
            'success' => true,
            'usages' => $data->usages
        ]);
    }
}
