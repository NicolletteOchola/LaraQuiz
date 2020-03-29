<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contentsController extends Controller
{
    public function contents(){
        $trial = "this page works fine";
        
        // return view('contents/content', compact('data'));
        return view('home', compact('trial'));
    }
}
