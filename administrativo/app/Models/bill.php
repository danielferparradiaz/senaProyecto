<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table='bills';
    protected $fillable=[
        'billState_id',
        'paymentMethod_id',
        'subTotal',
        "totalQuantity",
        'user_id',
        'created_at',
        'updated_at'
    ];


    public function orderBase(){
        return $this->hasMany( OrderBase::class );
    }


    public function paymentmethod(){
        return $this->belongsTo( Paymentmethod::class, 'paymentMethod_id', 'id' );
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function state(){
        return $this->belongsTo( Billstate::class, 'billState_id', 'id' );
    }



}
