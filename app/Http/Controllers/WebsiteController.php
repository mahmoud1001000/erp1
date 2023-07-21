<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request){
        $slug=$request->slug;
        return view('website.index',['slug'=>$slug]);
    }
}
