<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Jobs\NewsJob;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.news.index');
    }

    public function newsData(Request $request){
        if ($request->ajax()) {
            $data=News::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $action = '';
                    $action.='<a href="'.route('news.edit', $row->id).'" class="btn btn-primary btn-edit" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>';
                    // $action.='<a href="'.route('news.destroy', $row->id).'" class="btn btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete">Delete</a>';
                    $action .= '<form action="' . route('news.destroy', $row->id) . '" method="POST" style="display: inline;">';
                    $action .= '<input type="hidden" name="_method" value="DELETE">';
                    $action .= csrf_field();
                    $action .= '<button type="submit" class="btn btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete">Delete</button>';
                    $action .= '</form>';
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        // Validate the request
        $validatedData = $request->validate($rules);

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time().'.'.$coverImage->getClientOriginalExtension();
            $coverImagePath = 'cover_images/' . $coverImageName;
            $coverImage->move(public_path('cover_images'), $coverImageName);
        }
        if ($request->hasFile('image')) {
            $newsImage = $request->file('image');
            $newsImageName = time().'.'.$newsImage->getClientOriginalExtension();
            $newsImagePath = 'newsImages/' . $newsImageName;
            $newsImage->move(public_path('newsImages'), $newsImageName);
        }
        DB::beginTransaction();
        try{
            $news = new News();
            $news->title = $request->title;
            $news->sub_title = $request->sub_title;
            if(isset($request->cover_image) && !empty($request->cover_image)){$news->cover_image = $coverImagePath ?? null;}
            if(isset($request->image) && !empty($request->image)){$news->image = $newsImagePath ?? null;}
            // Save the data
            $news->save();

            // Dispatch the job
            $data = [
                'subject' => 'New News Article Published',
                'message' => 'A new news article titled "' . $news->title . '" has been published.',
            ];
            NewsJob::dispatch($data);

            DB::commit();
            return redirect()->route('news.index')->with('success', 'data has been saved successfully.');
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->route('news.index')->with('error', 'something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
        $rules = [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        // Validate the request
        $request->validate($rules);




        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time().'.'.$coverImage->getClientOriginalExtension();
            $coverImagePath = 'cover_images/' . $coverImageName;
            $coverImage->move(public_path('cover_images'), $coverImageName);
        }
        if ($request->hasFile('image')) {
            $newsImage = $request->file('image');
            $newsImageName = time().'.'.$newsImage->getClientOriginalExtension();
            $newsImagePath = 'newsImages/' . $newsImageName;
            $newsImage->move(public_path('newsImages'), $newsImageName);
        }
        DB::beginTransaction();
        try{
            $news->title = $request->title;
            $news->sub_title = $request->sub_title;
            if(isset($request->cover_image) && !empty($request->cover_image)){$news->cover_image = $coverImagePath ?? null;}
            if(isset($request->image) && !empty($request->image)){$news->image = $newsImagePath ?? null;}
            // Save the data
            $news->save();

            DB::commit();
            return redirect()->route('news.index')->with('success', 'data has been updated successfully.');
        }
        catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->route('news.index')->with('error', 'something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
        $news->delete();
        return redirect()->route('news.index')->with('success', 'data has been deleted successfully.');
    }
}
