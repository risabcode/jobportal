<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        return view('admin.inquiries.index', [
            'inquiries' => Inquiry::latest()->paginate(20),
        ]);
    }

    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function update(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 'resolved']);
        return back()->with('success', 'Inquiry resolved.');
    }
}
