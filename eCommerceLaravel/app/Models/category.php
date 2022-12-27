<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\home;

class category extends Model
{
    use HasFactory;
    public function categories(){
        return $this->belongsToMany(product::class, 'products_categories', 'product_id', 'category_id');
    }
    public function products(){
        return $this->belongsToMany(product::class, "products_categories", "category_id", "product_id");
    }

}
