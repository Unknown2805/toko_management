<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOut;
use App\Models\HistoryOut;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProductsExport;
use App\Exports\TransactionExports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
//view
    public function index()
        {
            $category = Category::with('products.outs.historyouts.transactions')->get();    
            // dd($transactions);

            return view('transaction.index',compact('category'));
        }

//pdf
    public function sale_pdf()
        {
            $category = Category::with('products.outs.historyouts.transactions')->get();
            $pdf = Pdf::loadview('transaction.pdf',['category'=>$category]);
            return $pdf->download('Products Sale.pdf');
        }
    public function periode_pdf(Request $request)
        {
            $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
            $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
            $transactions = Transaction::with('historyout')->whereBetween('created_at', [$tgl1, $tgl2])->get();
            foreach ($transactions as $transaction) {
                $transaction->history_out = HistoryOut::where('id', $transaction->history_out_id)->first();
                $transaction->history_out->product_out = ProductOut::where('id', $transaction->history_out->product_out_id)->first();
                $transaction->history_out->product_out->product = Product::where('id', $transaction->history_out->product_out->product_id)->first();
                $transaction->history_out->product_out->product->category = Category::where('id', $transaction->history_out->product_out->product->category_id)->first();
            }
            // dd($transactions);
            $pdf = Pdf::loadview('transaction.pdf_period',['transactions'=>$transactions,'tgl1'=>$tgl1,'tgl2'=>$tgl2,]);
            return $pdf->download('Products Sale.pdf');
        }
//excel
    public function export_excel()
        {
            return Excel::download(new TransactionExports, 'transaction.xlsx');
        }
}   