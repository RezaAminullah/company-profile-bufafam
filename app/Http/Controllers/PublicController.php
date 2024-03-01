<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('homepage');
    }
    public function news(){
        return view('news');
    }
    public function product(){
        return view('product');
    }
    public function contact(){
        return view('contact');
    }
    public function aboutus(){
        return view('aboutus');
    }
}
