<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\aboutUs;
use App\Models\News;
use App\Models\newsletterSubscribe;

class FrontController extends Controller
{
    //
    // private $footer;
    public function __construct() {
        // $this->footer = Footer::first();
    }

    public function index(){
        return view('front.home');
    }


    public function about_Us()
    {
        return view('front.aboutUs');
    }
  
    public function contact_us()
    {
        return view('front.contactUs');
    }

}
