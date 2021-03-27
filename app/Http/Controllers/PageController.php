<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function root()
    {
        return redirect('/products', 301);
    }
}
