<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOut;
use App\Models\HistoryOut;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::with('products.outs')->limit(10)->get();
        $data = Transaction::all();
        
                            
            $this_year = Carbon::now()->format('Y');
            $month_p = Transaction::where('created_at','like', $this_year.'%')->get();
            
            for ($i=1; $i <= 12; $i++){
                $data_month_un_p[(int)$i]=0;
                $data_month_rug_p[(int)$i]=0;    
            }
    
            foreach ($month_p as $a) {
                $bulan_in_p= explode('-',carbon::parse($a->created_at)->format('Y-m-d'))[1];
    
                    $data_month_un_p[(int) $bulan_in_p]+= $a->netto; 
                    $data_month_rug_p[(int) $bulan_in_p]+=$a->loss;
               
            
    
                
            }
            return view('dashboard.index',compact('category'))
            -> with('data_month_un_p', $data_month_un_p)
            -> with('data_month_rug_p', $data_month_rug_p);
            ;
                      
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
