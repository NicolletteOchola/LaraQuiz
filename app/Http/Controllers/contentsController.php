<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contentsController extends Controller
{
    public function contents(){
        $data = "this page works fine";
        
        return view('contents/content', compact('data'));
    }
}
