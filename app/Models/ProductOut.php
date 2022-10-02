<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOut extends Model
{
    use HasFactory;
    
    protected $table = 'product_outs';

    protected $fillable = [
        'product_id',
        'qty_k',
        'price_k'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
