<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    // index
    public function index()
    {
        $data = Contact::latest()->get();
        return view('admin.inbox', [
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();

        return back()->with('success', 'Delete success!');
    }
}
