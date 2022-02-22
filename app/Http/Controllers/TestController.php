<?php

namespace App\Http\Controllers;

use App\Models\Test;

class TestController extends Controller
{
    public function __invoke(Test $slug)
    {
        return view('test', compact("test"));
    }
}
