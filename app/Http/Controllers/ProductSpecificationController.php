<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSpecification;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class ProductSpecificationController extends Controller
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
        return view('admin.product-specification.index');
    }

    public function productspecificationdata(Request $request){
        // dd("SDf");
        if ($request->ajax()) {
            $data=ProductSpecification::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function($row){
                    $action = '';
                    $action.=' <a href="#" class="btn btn-danger PSDeleteBtn" id="'.$row->id.'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $action.=' <a href='.route('product-specification.edit', $row->id).' class="btn btn-primary mr-2 _effect--ripple waves-effect waves-light" id="'.$row->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
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
                ->rawColumns(['action','title','id','status'])
                ->make(true);
        }
    }


    public function create(){
        return view('admin.product-specification.create');
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'title' => 'required'
            ]);

            $ps=new ProductSpecification();
            $ps->title=$request['title'];
            $ps->status=$request['status'];
            $ps->save();

            return redirect()->route('product-specification.index')->with('flash_success', 'Product Specification inserted successfully');

             
    }



    public function edit($id){
        $ps=ProductSpecification::find($id);
        return view('admin.product-specification.edit',compact('ps'));
    }


    public function update(Request $request)
    {   
        $validatedData = $request->validate([
                'title' => 'required'
        ]);
        
        
        $update_data =array(
            'title'=>$request['title'],
            'status'=>$request['status']
        );

        ProductSpecification::where('id',$request['id'])->update($update_data);                


        return redirect()->route('product-specification.index')->with('flash_success', 'Product Specification update successfully');
        
    }


    public function dalete($id){
        $ps=ProductSpecification::find($id);
        $ps->delete();
        return response()->json([
            'success' => true,
            'error' => '',
        ]);
    }
    
    

}
