<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBase extends Model
{
    use HasFactory;
    protected $table = 'ordersbase';
   
    public function product(){
        return $this->belongsTo( Product::class );
    }

    
}
