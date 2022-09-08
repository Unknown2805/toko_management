<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::with('products')->get();

        return view('product.index',compact('supplier'));
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
            'image' => 'file|max:3072',
            'name' => 'required',
            'qty' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'supplier_id' => 'required'

        ]);
        $product =  new Suplier();
        $product->name = $request->name;
        $product->qty= $request->qty;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->supplier_id = $request->supplier_id;


        if($request->image){

            $img = $request->file('image');
            $filename = $img->getClientOriginalName();
    
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/product',$filename);
            }
            $product->image = $request->file('image')->getClientOriginalName();
        }
        // dd($
     $product->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
