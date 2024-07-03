<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
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
        return view('admin.homePage.testimonial.index');
    }

    public function testimonialdata(Request $request){
        // dd("SDf");
        if ($request->ajax()) {
            $data=Testimonial::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $action = '';
                    $action.=' <a href="#" class="btn btn-danger testimonialDeleteBtn" id="'.$row->id.'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $action.=' <a href='.route('testimonial.edit', $row->id).' class="btn btn-primary mr-2 _effect--ripple waves-effect waves-light" id="'.$row->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    return $action;
                })
                ->editColumn('image', function ($row) {
                    $image_name= '<img src="'.asset($row->image) .'" alt="testimonial Image" style="max-width: 200px; height: auto;">';
                    return $image_name;
                })
                ->rawColumns(['action','image','title','description','id','type','status'])
                ->make(true);
        }
    }


    public function create(){
        return view('admin.homePage.testimonial.create');
    }

    public function store(Request $request)
    {
     
        $testimonial=new Testimonial();
  
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');
    
            // Generate a unique filename for the image
            $imageName = time().'.'.$image->getClientOriginalExtension();
    
            // Move the uploaded file to the public directory
            $image->move(public_path('testimonial_images'), $imageName);
    
            // Save the image path
            $imagePath = 'testimonial_images/' . $imageName;


        }else{
            $imagePath = '';
        }
            $testimonial->type=$request['type'];
            $testimonial->image=$imagePath;
            $testimonial->title=$request['title'];
            $testimonial->description=$request['description'];
            $testimonial->save();

            return redirect()->route('testimonial.index')->with('flash_success', 'Record inserted successfully');
        
    }



    public function edit($id){
        $testimonial=Testimonial::find($id);
        return view('admin.homePage.testimonial.edit',compact('testimonial'));
    }


    public function update(Request $request)
    {
        
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');
    
            // Generate a unique filename for the image
            $imageName = time().'.'.$image->getClientOriginalExtension();
    
            // Move the uploaded file to the public directory
            $image->move(public_path('testimonial_images'), $imageName);
    
            // Save the image path
            $imagePath = 'testimonial_images/' . $imageName;
            
        }else{
            $imagePath = $request['old_image'];
        }

        $update_data =array(
            'type'=>$request['type'],
            'image'=>$imagePath,
            'title'=>$request['title'],
            'description'=>$request['description']
        );

        Testimonial::where('id',$request['id'])->update($update_data);                


        return redirect()->route('testimonial.index')->with('flash_success', 'Record update successfully');
        
    }


    public function testimonialDelete($id){
        $testimonial=Testimonial::find($id);
        $testimonial->delete();
        return response()->json([
            'success' => true,
            'error' => '',
        ]);
    }
    
    

}
