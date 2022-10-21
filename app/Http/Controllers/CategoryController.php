<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
            $this->validate($request, [
                'name' => 'required|unique:categories,name',
            ]);

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

            $request->validate([
                'name' => 'required',  
            ]);

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

            return redirect()->back();
        }
}
