<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
//Auth
    public function __construct()
        {
            $this->middleware('auth');
        }
// view
    public function index()
        {
            $category = Category::all();
            return view('category.index',compact('category'));
        }

//pdf
    public function category_pdf()
        {
            $category = Category::get();    
            $pdf = Pdf::loadview('category.pdf',['category'=>$category]);
            return $pdf->download('Category.pdf');
        }
//add
    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:categories,name',
            ]);
            if($validator->fails()){
                toast()->error('FAILED','failed add product')->position('top');
                return redirect()->back();               
            }else{
                toast()->success('SUCCESS','success add product')->position('top');
            }

            $category = new Category();
            $category->name = $request->name;

            
            // dd($category);
            $category->save();

            return redirect()->back();

        }

//edit
    public function edit(Request $request,$id)
        {
            $category = Category::where('id',$id)->firstOrFail();

            $validator = Validator::make($request->all(), [
                'name' => 'required',  
            ]);
            if($validator->fails()){
                toast()->error('FAILED','failed add product')->position('top');
                return redirect()->back();               
            }else{
                toast()->success('SUCCESS','success add product')->position('top');
            }
            $category->name = $request->name;

            // dd($category);
            $category->update();

            return redirect()->back();

        }

//delete
    public function destroy($id)
        {
            $data = Category::find($id);

            $data->delete();
            toast()->success('SUCCESS','success delete products')->position('top');
            return redirect()->back();
        }
}
