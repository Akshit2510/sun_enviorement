<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        return view('admin.category.index');
    }

    public function categorydata(Request $request){
        // dd("SDf");
        if ($request->ajax()) {
            $data=Category::with(['sub_category']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $action = '';
                    $action.=' <a href="#" class="btn btn-danger categoryDeleteBtn" id="'.$row->id.'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $action.=' <a href='.route('category.edit', $row->id).' class="btn btn-primary mr-2 _effect--ripple waves-effect waves-light" id="'.$row->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    return $action;
                })
                ->addColumn('status',function($row){
                    if($row['status'] == 1){
                        $status = 'Active';
                    }else{
                        $status = 'Inactive';
                    }
                    return $status;
                })
                ->addColumn('sub_category',function($row){
                   
                    return !empty($row['sub_category']['title'])?$row['sub_category']['title']:'';
                })
                ->rawColumns(['action','title','id','status','sub_category'])
                ->make(true);
        }
    }


    public function create(){
        $sub_category = Category::where('status',1)->get();
        return view('admin.category.create',compact('sub_category'));
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'title' => 'required'
            ]);

            $category=new Category();
            $category->title=$request['title'];
            $category->sub_category_id=$request['sub_category_id'];
            $category->status=$request['status'];
            $category->save();

            return redirect()->route('category.index')->with('flash_success', 'Category inserted successfully');

             
    }



    public function edit($id){
        $category=Category::find($id);
        $sub_category = Category::where('status',1)->get();
        return view('admin.category.edit',compact('category','sub_category'));
    }


    public function update(Request $request)
    {   
        $validatedData = $request->validate([
                'title' => 'required'
        ]);
        
        
        $update_data =array(
            'title'=>$request['title'],
            'sub_category_id'=>$request['sub_category_id'],
            'status'=>$request['status']
        );

        Category::where('id',$request['id'])->update($update_data);                


        return redirect()->route('category.index')->with('flash_success', 'Category update successfully');
        
    }


    public function dalete($id){
        $category=Category::find($id);
        $category->delete();
        return response()->json([
            'success' => true,
            'error' => '',
        ]);
    }
    
    

}
