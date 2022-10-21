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
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function outs(){
        return $this->hasMany(ProductOut::class);
    }

    public function historyins(){
        return $this->hasMany(HistoryIn::class,'');
    }
}
