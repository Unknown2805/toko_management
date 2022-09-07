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
        'supplier_id',
    ];

    public function supplier(){
        $this->belongsTo(Supplier::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
