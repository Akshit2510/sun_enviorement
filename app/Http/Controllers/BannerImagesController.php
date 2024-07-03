<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerImages;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class BannerImagesController extends Controller
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
   
    public function index(){
        $bannerImages=BannerImages::where('type','banner')->get();
        return view('admin.homePage.bannerImages.index',compact('bannerImages'));
    }

    public function bannerImagedata(Request $request){
        // dd("SDf");
        if ($request->ajax()) {
            $data=BannerImages::where('type','banner');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $action = '';
                    $action.=' <a href="#" class="btn btn-danger bannerDeleteBtn" id="'.$row->id.'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $action.=' <a href='.route('banner.edit', $row->id).' class="btn btn-primary mr-2 _effect--ripple waves-effect waves-light" id="'.$row->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    return $action;
                })
                ->editColumn('image', function ($row) {
                    $image_name= '<img src="'.asset($row->image) .'" alt="Banner Image" style="max-width: 200px; height: auto;">';
                    return $image_name;
                })
                ->rawColumns(['action','image','title','description','id'])
                ->make(true);
        }
    }


    public function create(){
        return view('admin.homePage.bannerImages.create');
    }

    public function store(Request $request)
    {
        
        if ($request->hasFile('image')) {
            $bannerImage=new BannerImages();
            // Get the uploaded file
            $image = $request->file('image');
    
            // Generate a unique filename for the image
            $imageName = time().'.'.$image->getClientOriginalExtension();
    
            // Move the uploaded file to the public directory
            $image->move(public_path('banner_images'), $imageName);
    
            // Save the image path
            $imagePath = 'banner_images/' . $imageName;
            $bannerImage->type='banner';
            $bannerImage->image=$imagePath;
            $bannerImage->title=$request['banner_title'];
            $bannerImage->description=$request['banner_description'];
            $bannerImage->save();

            return redirect()->route('bannerImages.index')->with('flash_success', 'Record inserted successfully');

        }

         return redirect()->back()->with('flash_error','Opps, something worng with uploading image. !!');
        
    }



    public function edit($id){
        $bannerImage=BannerImages::find($id);
        return view('admin.homePage.bannerImages.edit',compact('bannerImage'));
    }


    public function update(Request $request)
    {
        
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');
    
            // Generate a unique filename for the image
            $imageName = time().'.'.$image->getClientOriginalExtension();
    
            // Move the uploaded file to the public directory
            $image->move(public_path('banner_images'), $imageName);
    
            // Save the image path
            $imagePath = 'banner_images/' . $imageName;
            
        }else{
            $imagePath = $request['old_image'];
        }

        $update_data =array(
            'type'=>'banner',
            'image'=>$imagePath,
            'title'=>$request['banner_title'],
            'description'=>$request['banner_description']
        );

        BannerImages::where('id',$request['id'])->update($update_data);                


        return redirect()->route('bannerImages.index')->with('flash_success', 'Record update successfully');
        
    }


    public function bannerImagesDelete($id){
        $bannerImage=BannerImages::find($id);
        $bannerImage->delete();
        return response()->json([
            'success' => true,
            'error' => '',
        ]);
    }
    
    

}
