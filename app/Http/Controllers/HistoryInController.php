<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;
class HistoryInController extends Controller
{
//view
    public function index()
        {
            $category = Category::with('products.historyins')->orderBy('created_at','desc')->get();
                    
            return view('historyIn.index',compact('category'));

        }
//pdf
    public function his_in_pdf()
        {
            $category = Category::with('products.historyins')->get();
        
            $pdf = Pdf::loadview('historyIn.pdf',['category'=>$category]);
            return $pdf->download('history In.pdf');
        }
}
