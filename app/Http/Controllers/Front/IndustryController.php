<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    public function index()
    {
        return view('front.industries');
    }
}
