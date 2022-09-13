<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'supplier_id'
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }    
    public function products(){
        return $this->hasMany(Product::class);
    }
}
