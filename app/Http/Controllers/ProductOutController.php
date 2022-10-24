<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Product;
use App\Models\HistoryOut;
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
        return view('product.index',compact('category','out'));
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
    public function sell(Request $request,$id)
    {
        // dd($request);
        $this->validate($request, [
            'qty_k' => 'required',     

        ]);

        $product = Product::where('id',$request->product_id)->first();
        $out = ProductOut::where('product_id',$request->product_id)->first();

        $stock = $product->qty - $request->qty_k;
      
            Product::find($id)->update([
                "qty" => $stock
            ]);
            ProductOut::find($id)->update([
                "qty_k" => $out->qty_k + $request->qty_k
            ]);            
        
        $historyOut = HistoryOut::create([
            "product_out_id" => $request->product_id,
            "price_k" => $out->price_k,
            "qty_k" => $request->qty_k
        ]);

        $total = $historyOut->price_k*$historyOut->qty_k ;
        $netto = ($out->price_k - $product->price)* $historyOut->qty_k ;

        $transaction = Transaction::create([
        "history_out_id" => $historyOut->id,
        "profit" => $netto,
        "loss" => 0,
        "netto" => $netto,
        "total" => $total
        ]); 
        
        
            // dd($total);

        return redirect()->back();

    }

   
    public function destroy(ProductOut $productOut)
    {
        //
    }
}
