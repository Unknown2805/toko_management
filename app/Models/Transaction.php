<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'untung',
        'rugi',
        'tgl_k',
        'qty_k',
        'product_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
