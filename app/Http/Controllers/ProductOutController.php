<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOut;
use Illuminate\Http\Request;

class ProductOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with('products.outs')->get();
        $out = ProductOut::all();
        return view('out.index',compact('category','out'));
    }

    
   
    public function price(Request $request,$id)
    {
        $product = Product::where('id',$request->product_id)->first();

        $out = ProductOut::where('product_id',$request->product_id)->first();

        $price_k = preg_replace("/[^0-9]/", "", $request->price_k);

        if($product->price <= $price_k){

            ProductOut::find($id)->update([
                "price_k" => $price_k
            ]);
        }
            // dd($product);

        return redirect()->back();


    }
    public function editPrice(Request $request,$id)
    {
        $product = Product::where('id',$request->product_id)->first();

        $out = ProductOut::where('product_id',$request->product_id)->first();

        $price_k = preg_replace("/[^0-9]/", "", $request->price_k);
        
        if($product->price <= $price_k){

            ProductOut::find($id)->update([
                "price_k" => $price_k
            ]);
        }

            // dd($product);
            return redirect()->back();
       

    }
    public function buy(Request $request,$id)
    {
        
        $product = Product::where('id',$request->product_id)->first();
        $out = ProductOut::where('product_id',$request->product_id)->first();

        Product::find($id)->update([
            "qty" => $product->qty - $request->qty_k
        ]);
        ProductOut::find($id)->update([
            "qty_k" => $out->qty_k + $request->qty_k
        ]);
            // dd($product);

        return redirect()->back();

    }

   
    public function destroy(ProductOut $productOut)
    {
        //
    }
}
