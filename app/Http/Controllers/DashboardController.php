<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOut;
use App\Models\HistoryOut;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//view 
    public function index()
        {
            $category = Category::with('products.outs')->get();
            $profile = Profile::all();
            $product = Product::all();
            $historyOuts = HistoryOut::all();
            $user = User::all();
            $data = Transaction::all();
            
                                
            foreach ($category as $c) {
                foreach ($c->products as $p) {
                    foreach ($p->outs as $o) {
                        $top = $o->orderBy('qty_k','desc');
                    }
                }
            }

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

                $stock = $product->sum('qty');
                $sold = $historyOuts->sum('qty_k');
                return view('dashboard.index',compact('category','profile','user','stock','sold',))
                -> with('data_month_un_p', $data_month_un_p)
                -> with('data_month_rug_p', $data_month_rug_p);
                ;
                        
        }

//add profile
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'file|max:3072',
            'name',
            'address',
        ]);
        $profile =  new Profile();                
        $profile->name = $request->name;
        $profile->address= $request->address;
        
        if($request->image){
            
            $img = $request->file('image');
            $filename = $img->getClientOriginalName();
            
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/profile',$filename);
            }
            $profile->image = $request->file('image')->getClientOriginalName();
        }
        // dd($profile);
        $profile->save();

        return redirect()->back();

    }

//edit profile
    public function edit(Request $request,$id){
        $data = Profile::where('id',$id)->firstOrFail();

        $request->validate([
            'image' => 'file|max:3072',
            'address',
            'name',
            
        ]);

        $data->name = $request->name;
        $data->address = $request->address; 

        if($request->image){

            $img = $request->file('image');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/profile',$filename);
            }
            $data->image = $request->file('image')->getClientOriginalName();
        
        }
        // dd($data);
        $data->update();

        return redirect()->back();
    }


//edit user
    public function editUser(Request $request,$id){
        $data = User::where('id',$id)->firstOrFail();

        $request->validate([
            'image' => 'file|max:3072',
            'email',
            'name',
            
        ]);

        $data->name = $request->name;
        $data->email = $request->email; 

        if($request->image){

            $img = $request->file('image');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/user',$filename);
            }
            $data->image = $request->file('image')->getClientOriginalName();
        
        }
        // dd($data);
        $data->update();

        return redirect()->back();
    }
}
