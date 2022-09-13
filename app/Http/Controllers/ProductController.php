<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Auth
        public function __construct()
            {
                $this->middleware('auth');
            }
    //index product  
        public function index()
            {
                $supplier = Supplier::with('categories.products')->get();
                
                return view('product.index',compact('supplier'));
            }

    // add product
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
                $product->price = $request->price;
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

                return redirect()->back();

            }
    //edit product
        public function edit(Request $request,$id)
            {
                $product = Product::where('id',$id)->firstOrFail();

                $request->validate([
                    'image' => 'file|max:3072',
                    'name' => 'required',
                    'qty' => 'required',
                    'desc' => 'required',
                    'price' => 'required',
                    'category_id' => 'required'       
                ]);

                $product->name = $request->name;
                $product->qty= $request->qty;
                $product->desc = $request->desc;
                $product->price = $request->price;
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

                return redirect()->back();

            }

    //delete product
    public function destroy($id)
        {
            $data = Product::find($id);

            $data->delete();

            return redirect()->back();
        }
}
