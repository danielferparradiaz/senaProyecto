<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Orderbase extends Model
{
    use HasFactory;
    protected $table="ordersbase";

    protected $fillable=[
        "quantity",
        "bill_id",
        "dimensionPrint_id",
        "product_id",
        "product_price"
    ];

    public function bills(){
        return $this->belongsTo(Bill::class, "bill_id", "id");
    }

    public function products(){
        return $this->hasMany(product::class,  "id","product_id");
    }
}
