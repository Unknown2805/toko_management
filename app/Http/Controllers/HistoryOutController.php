<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOut;
use App\Models\HistoryOut;

use Illuminate\Http\Request;

class HistoryOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with('products.outs.historyouts')->get();
                
        return view('historyOut.index',compact('category'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryOut  $historyOut
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryOut $historyOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryOut  $historyOut
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryOut $historyOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryOut  $historyOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryOut $historyOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryOut  $historyOut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = HistoryOut::find($id);

        $data->delete();

        return redirect()->back();
    }
}