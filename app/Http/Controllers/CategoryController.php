<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::with('categories')->get();
        return view('category.index',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'supplier_id' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->supplier_id = $request->supplier_id;

        
        // dd($category);
        $category->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $category = Category::where('id',$id)->firstOrFail();

        $request->validate([
            'name' => 'required',  
            'supplier_id' => 'required'
        ]);

        $category->name = $request->name;
        $category->supplier_id = $request->supplier_id;

        // dd($category);
        $category->update();

        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Category::find($id);

        $data->delete();

        return redirect()->back();
    }
}
