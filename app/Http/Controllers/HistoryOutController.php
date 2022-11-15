<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOut;
use App\Models\HistoryOut;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class HistoryOutController extends Controller
{    
//Auth
    public function __construct()
        {
            $this->middleware('auth');
        }
//view
    public function index()
    {
        $category = Category::with('products.outs.historyouts')->get();
                
        return view('historyOut.index',compact('category'));
    }
//pdf
    public function his_out_pdf()
    {
        $category = Category::with('products.outs.historyouts')->get();    
        $pdf = Pdf::loadview('historyOut.pdf',['category'=>$category]);
        return $pdf->download('History Out.pdf');
    }
}