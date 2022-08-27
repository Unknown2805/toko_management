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
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
