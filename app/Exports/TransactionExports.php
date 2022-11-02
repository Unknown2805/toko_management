<?php

namespace App\Exports;
 
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Products;
use App\Models\Transaction;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExports implements FromView
{

    public function view(): View
    {
        return view('transaction.excel', [
            'category' => Category::all()
        ]);
    }
}
