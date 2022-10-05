<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOut extends Model
{
    use HasFactory;

    protected $table = 'history_outs';

    protected $fillable = [
        'product_out_id',
        'price_k',
        'qty_k'

    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function out(){
        return $this->belongsTo(ProductOut::class);
    }
}
