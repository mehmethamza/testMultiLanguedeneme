<?php

namespace App\Http\Controllers;

use App\Models\Test;

class TestController extends Controller
{
    public function single(Test $slug)
    {
        return view('test', compact("test"));
    }
    
    public function show($slug)
    {
        // BUrda slug->tr gerek yok hatırla dökümanlarda modeli dile göre filtreleme vardı  a 
        $test = Test::where("slug->tr",$slug)->first(); 
        return $test;
       return view("test",compact("test"));
    }
}
