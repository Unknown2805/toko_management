<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'image',
        'name',
        'address',
        'email',
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }
}
