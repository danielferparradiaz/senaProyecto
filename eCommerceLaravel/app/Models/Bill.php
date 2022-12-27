<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table="bills";
    protected $fillable=[
        "billState_id",
        "paymentMethod_id",
        "subTotal",
        "user_id"
    ];
    public function orders(){
        return $this->hasMany(Orderbase::class);
    }

    public function states(){
        return $this->belongsTo(Billstate::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function payments(){
        return $this->belongsTo(Paymentmethod::class);
    }
}
