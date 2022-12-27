<?php

namespace App\Http\Controllers;
use App\Models\Shirtcolor;
use App\Models\Product;
use App\Models\Shirtsize;
use App\Models\Shirttype;
use App\Models\Category;
use App\Models\Descount;
use Illuminate\Http\Request;

class ClasificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size=Shirtsize::all();
        $type=Shirttype::all();
        $category=Category::all();
        $descount=Descount::all();
        $color=Shirtcolor::all();
        return view('pages.products.clasification', compact('size', 'type', 'category', 'descount', 'color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($clasification)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except("_token");

        if(isset($request->size)){
            Shirtsize::create($data);
        }

        if(isset($request->type)){
            Shirttype::create($data);
        }
        
        if(isset($request->color ) && isset($request->name)){
            Shirtcolor::create($data);
        }
        
        if(isset($request->descount)){
            Descount::create($data);
        }
        
        if(isset($request->name)){
            Category::create($data);
        }


        return redirect("clasificaciones");
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Hello
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $name)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
