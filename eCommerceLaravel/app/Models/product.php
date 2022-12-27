<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\shirtcolor;
use App\Models\shirtsize;
use App\Models\shirttypes;
use App\Models\typesprint;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsToMany(Category::class, "products_categories", "product_id", "category_id");
    }

    public function colors(){
        return $this->belongsToMany(Shirtcolor::class, "products_shirtcolors", "product_id", "shirtcolor_id")
        ->as("product_color")
            ->withPivot("image");
    }

    public function sizes(){
        return $this->belongsToMany(Shirtsize::class, "products_shirtsizes", "product_id", "shirtsize_id")
        ->withPivot("stock");
    }

    public function typesprint(){
        return $this->belongsToMany(typesprint::class, "products_typesprint", "product_id", "typeprint_id");
    }

    public function type(){
        return $this->belongsToMany(shirttype::class, "products_shirttypes", "product_id", "shirttype_id");
    }


}
