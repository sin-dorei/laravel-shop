<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }
}
