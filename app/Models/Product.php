<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'qty',    
        'desc',
        'price',
        'transaction_id',
    ];

    public function supplier(){
        $this->belongsTo(Supplier::class);
    }

    public function transactions(){
        return $this->belongsToMany(Transaction::class);
    }
}
