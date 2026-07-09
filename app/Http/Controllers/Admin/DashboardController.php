<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\MegaMenu;
use App\Models\Tool;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // index
    public function index()
    {
        $allTools = Tool::get();
        $allBlog = Blog::get();
        $allMenu = MegaMenu::get();

        return view('admin.home', [
            'active_tools' => $allTools->where('status', 'active')->count(),
            'inactive_tools' => $allTools->where('status', 'inactive')->count(),
            
            'active_menu' => $allMenu->where('status', 'active')->count(),
            'inactive_menu' => $allMenu->where('status', 'inactive')->count(),

            'active_blog'=>$allBlog->where('status', 'published')->count(),
            'inactive_blog'=>$allBlog->where('status', 'draft')->count(),

            'inbox'=>Contact::count(),
        ]);
    }
}
