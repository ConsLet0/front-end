<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'no_table',
        // kolom lain yang ingin diisi secara massal
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }

}
