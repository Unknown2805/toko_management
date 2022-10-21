<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductOut;
use App\Models\HistoryIn;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//Auth
    public function __construct()
            {
                $this->middleware('auth');
            }
//view  
    public function index()
            {
                $category = Category::with('products.outs')->get();
                
                return view('product.index',compact('category'));
            }
//pdf
    public function product_pdf()
        {
            $category = Category::with('products.outs')->get();
            $pdf = Pdf::loadview('product.pdf',['category'=>$category]);
            return $pdf->download('Products.pdf');
        }
//add 
    public function store(Request $request)
            {
                
                $this->validate($request, [
                    'image' => 'file|max:3072',
                    'name' => 'required',
                    'qty' => 'required',
                    'desc' => 'required',
                    'price' => 'required',
                    'category_id' => 'required',

                ]);
                $product =  new Product();                
                $product->name = $request->name;
                $product->qty= $request->qty;
                $product->desc = $request->desc;
                $product->price = preg_replace("/[^0-9]/", "", $request->price);
                $product->category_id = $request->category_id;
                
                if($request->image){
                    
                    $img = $request->file('image');
                    $filename = $img->getClientOriginalName();
                    
                    if ($request->hasFile('image')) {
                        $request->file('image')->storeAs('/product',$filename);
                    }
                    $product->image = $request->file('image')->getClientOriginalName();
                }
                $product->save();
                // dd($product);
                
                ProductOut::create([
                    'product_id' => $product->id
                ]);
                HistoryIn::create([
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'qty' => $product->qty
                ]);
                return redirect()->back();

            }

            
//edit
    public function edit(Request $request,$id)
            {
                $product = Product::where('id',$id)->firstOrFail();

                $request->validate([
                    'image' => 'file|max:3072',
                    'name' => 'required',
                    'qty' => 'required',
                    'desc' => 'required',
                    'price' => 'required',
                    'category_id' => 'required',
                    'price_k'    
                ]);
                
                $product->name = $request->name;
                $product->qty= $request->qty;
                $product->desc = $request->desc;
                $product->price = preg_replace("/[^0-9]/", "", $request->price);
                $product->category_id = $request->category_id;
                

                if($request->image){

                    $img = $request->file('image');
                    $filename = $img->getClientOriginalName();
            
                    if ($request->hasFile('image')) {
                        $request->file('image')->storeAs('/product',$filename);
                    }
                    $product->image = $request->file('image')->getClientOriginalName();

                    // dd($product);
                }
                $product->update();

                $out = ProductOut::where('product_id',$request->product_id)->first();

                $price_k = preg_replace("/[^0-9]/", "", $request->price_k);
                
                if($product->price <= $price_k){

                ProductOut::find($id)->update([
                    "price_k" => $price_k
                ]);
                }

                return redirect()->back();

            }

//delete
    public function destroy($id)
        {
            $data = Product::find($id);

            $data->delete();

            return redirect()->back();
        }
    
}
