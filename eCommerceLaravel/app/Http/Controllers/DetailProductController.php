<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class DetailProductController extends Controller
{

    public function show($categoryname, $name)
    {
        /*-------------Start Get product data-------------*/

        $product = Product::where('name', str_replace('-' , ' ', ($name)))->get();
        $data = [];
        foreach($product as $products){
            $data['product'] = $products;
            $products->sizes; $products->colors; $products->typesprint; $products->type; $products->categories;
        }

        /*-------------End Get product data-------------*/

        /*-------------Start Get related products  in Category-------------*/
        $product = Product::all();
        foreach($product as $products){
            $products->sizes; $products->colors; $products->typesprint; $products->type; $products->categories;
        }
        for($i = 0; $i < count($product); $i++){
            if(strtolower($categoryname) != strtolower($product[$i]->categories[0]->name)){
                unset($product[$i]);
            }
        }
        $data['moreproducts'] = $product;
        /*-------------End Get related products  in Category-------------*/

        // dd($data['moreproducts']->toArray());
        return view('user.products.detail', compact('data'));
    }

}

