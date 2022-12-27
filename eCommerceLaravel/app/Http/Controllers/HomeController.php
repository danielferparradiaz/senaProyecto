<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\home;
use App\Models\product;
use App\Models\profile;
use App\Models\category;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(!empty(session('id'))){
            $profile = profile::where('id', session('id'))->firstOrFail();
            session(['avatar' => $profile->avatar]);
        }
        $category = Category::all();
        foreach($category as $product => $productCategory){
            $productCategory = Product::whereRelation('categories', 'id', '=', '1')->get();
        }

        // dd($productCategory->toArray());
        return view('user.home.index', compact('category'));
    }

}

