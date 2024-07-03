<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\newsletterSubscribe;
use Yajra\DataTables\Facades\DataTables;

class NewsletterSubscribeController extends Controller
{
    //
    public function index(){
        return view('admin.newsletterSubscribe.index');
    }
    public function data(Request $request){
        if ($request->ajax()) {
            $data = NewsletterSubscribe::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    // return date('d-m-Y h:i:s A', strtotime($row->created_at));
                    return date('d-m-Y', strtotime($row->created_at));
                })
            ->make(true);
        }
    }
}
