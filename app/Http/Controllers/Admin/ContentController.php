<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return view('admin.content.index', [
            'pages' => PageContent::all(),
        ]);
    }

    public function update(Request $request, PageContent $page)
    {
        $page->update(['content' => $request->content]);
        return back()->with('success', 'Content updated.');
    }
}
