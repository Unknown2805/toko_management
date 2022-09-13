<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'image',
        'name',
        'qty',    
        'desc',
        'price',
        'supplier_id',
        'category_id'
    ];

    public function category(){
        $this->belongsTo(Category::class);
    }

    public function supplier(){
        $this->belongsTo(Supplier::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
