<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['frontIndex']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   
    public function getContactUs()
    {
        return view('admin.homepage.contact.index');
    }

    public function getContactData(Request $request){
        if ($request->ajax()) {
            $data=Contact::all();
            return DataTables::of($data)->make(true);
        }
    }
}
