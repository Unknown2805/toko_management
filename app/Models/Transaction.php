<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'history_out_id',
        'profit',
        'loss',
        'netto'
    ];

    public function historyout(){
        return $this->belongsTo(HistoryOut::class);
    }

}
