<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOut;
use App\Models\HistoryOut;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
//view
    public function index()
        {
            $category = Category::with('products.outs.historyouts.transactions')->get();
                    
            return view('transaction.index',compact('category'));
        }

//pdf
    public function sale_pdf()
        {
            $category = Category::with('products.outs.historyouts.transactions')->get();
            $pdf = Pdf::loadview('transaction.pdf',['category'=>$category]);
            return $pdf->download('Products Sale.pdf');
        }
}