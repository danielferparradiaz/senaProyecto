<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function byCategory($name)
    {
        $data = Product::with("categories")
            ->whereRelation("categories", "name" ,"=", $name)
            ->get();

            if(count($data) == 0){
                return view ('user.error.productCategory', compact('name'));
            }
            else{
                return view ('user.products.index', compact('data', 'name'));
            }

    }

    public function categories(){

        $data=Category::all();
        return view ('user.categories.index', compact('data'));

    }


    public function search( $text ){
        $data = product::where('name', 'LIKE', '%'.$text.'%')
            ->join('products_categories', 'product_id', 'id')
            ->get();
        $data = $data[0];

        $category = Category::all()->where('id', $data->category_id);
        $category = $category[($data->category_id)-1];
        
        $data['category'] = $category->name;

        return view('user.products.result', compact('data', 'text'));
    }



}
