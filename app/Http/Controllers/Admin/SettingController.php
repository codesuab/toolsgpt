<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // index
    public function index(){
        $projectPath = base_path();
        $command = "cd {$projectPath} && php artisan schedule:run >> /dev/null 2>&1";
        return view('admin.setting',[
            'command'=>$command
        ]);
    }
}
