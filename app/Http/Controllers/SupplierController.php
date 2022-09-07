<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();

        return view('supplier.index',compact('supplier'));
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
            'address' => 'required',
            'email' => 'required',


        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->email = $request->email;

        if($request->image){

            $img = $request->file('image');
            $filename = $img->getClientOriginalName();
    
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/supplier',$filename);
            }
            $supplier->image = $request->file('image')->getClientOriginalName();
        }
        // dd($supplier);
        $supplier->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $supplier = Supplier::where('id',$id)->firstOrFail();

        $request->validate([
            'image' => 'file|max:3072',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            
        ]);

        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->email = $request->email;
        
        if($request->image){

            $img = $request->file('image');
            $filename = $img->getClientOriginalName();
    
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/supplier',$filename);
            }
            $supplier->image = $request->file('image')->getClientOriginalName();
        }
        // dd($supplier);
        $supplier->update();

        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Supplier::find($id);

        $data->delete();

        return redirect()->back();
    }
}
