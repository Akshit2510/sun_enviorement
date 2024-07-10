<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\aboutUs;
use App\Models\News;
use App\Models\newsletterSubscribe;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

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

    public function saveContactUs(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->contact = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Your data has been save successfully.');
    }

}
