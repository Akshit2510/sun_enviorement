<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['frontIndex']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    public function productdata(Request $request){
        if ($request->ajax()) {
            $data=Product::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $action = '';
                    $action.=' <a href="#" class="btn btn-danger productDeleteBtn" id="'.$row->id.'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $action.=' <a href='.route('product.edit', $row->id).' class="btn btn-primary mr-2 _effect--ripple waves-effect waves-light" id="'.$row->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    return $action;
                })
                ->editColumn('image', function ($row) {
                    $image_name= '<img src="'.asset($row->image) .'" alt="Product Image" style="max-width: 200px; height: auto;">';
                    return $image_name;
                })
                ->rawColumns(['action','image','name','product_url','id','status'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $product=new Product();
            // Get the uploaded file
            $image = $request->file('image');
    
            // Generate a unique filename for the image
            $imageName = time().'.'.$image->getClientOriginalExtension();
    
            // Move the uploaded file to the public directory
            $image->move(public_path('products'), $imageName);
    
            // Save the image path
            $imagePath = 'products/' . $imageName;
            $product->image=$imagePath;
            $product->name=$request->name;
            $product->product_url=$request->product_url;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->status=$request->status;
            $product->save();
            return redirect()->route('product.index')->with('flash_success', 'Record inserted successfully');
        }
        return redirect()->back()->with('flash_error','Opps, something wrong with uploading image.!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');
    
            // Generate a unique filename for the image
            $imageName = time().'.'.$image->getClientOriginalExtension();
    
            // Move the uploaded file to the public directory
            $image->move(public_path('products'), $imageName);
    
            // Save the image path
            $imagePath = 'products/' . $imageName;
            
        }else{
            $imagePath = $request['old_image'];
        }

        $update_data =array(
            'image'=>$imagePath,
            'name'=>$request->name,
            'product_url'=>$request->product_url,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'status'=>$request->status,
        );

        Product::where('id',$request->id)->update($update_data);
        return redirect()->route('product.index')->with('flash_success', 'Record update successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        $product->delete();
        return response()->json([
            'success' => true,
            'error' => '',
        ]);
    }
}