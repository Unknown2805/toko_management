<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryIn extends Model
{
    use HasFactory;
    
    protected $table = 'history_ins';

    protected $fillable = [
        'product_id',
        'price',
        'qty'

    ];

    public function in(){
        return $this->belongsTo(Product::class);
    }
}
