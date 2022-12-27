<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Product extends Model
{
    use HasFactory;
    // protected $table='products';
    protected $fillable=[
        'name',
        'price',
        'description',
        'garanty',
        'quantity',
    ];

    // public function products_categories(){
    //     return $this->hasMany(Product_category::class);
    // }

    public function colors(){
        return $this->belongsToMany(Shirtcolor::class, 'products_shirtcolors', 'product_id', 'shirtcolor_id')
        ->as('product_color')->withPivot('image');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'category_id')->as('category');
    }

    public function sizes(){
        return $this->belongsToMany(Shirtsize::class, 'products_shirtsizes', 'product_id', 'shirtsize_id')
        ->withPivot('stock')->as('product_size');
    }
    public function types(){
        return $this->belongsToMany(Shirttype::class, 'products_shirttypes', 'product_id', 'shirttype_id')
        ->as('product_type');
    }
    
    public function descounts(){
        return $this->belongsToMany(Descount::class, 'products_descountsettings', 'product_id', 'descountsetting_id')
        ->withPivot('price')->as('product_descount');
    }
    
    public function prints(){
        return $this->belongsToMany(Typeprint::class, 'products_typesprint', 'product_id', 'typeprint_id')
        ->as('product_print');
    }
}
