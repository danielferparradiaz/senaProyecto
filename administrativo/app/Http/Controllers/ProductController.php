<?php

namespace App\Http\Controllers;

// use App\Models\product;
use App\Models\Product;
use App\Models\Shirtcolor;
use App\Models\Shirtsize;
use App\Models\Shirttype;
use App\Models\Typeprint;
use App\Models\Category;
use App\Models\Descount;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::where('state', '>', 0)->orderBy('created_at', 'desc')->get();
        return view('pages.products.index', compact('data'));
    }

    public function dumped()
    {

        $data = Product::where('state', '<=', 0)->orderBy('updated_at', 'desc')->get();
        $active=true;
        return view('pages.products.index', compact('data', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size=Shirtsize::all();
        $type=Shirttype::all();
        $category=Category::all();
        $descount=Descount::all();
        $color=Shirtcolor::all();
        $print=Typeprint::all();

        return view('pages.products.create', compact('size', 'type', 'category', 'descount', 'color', 'print'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');

        //Guardando el producto solamente
        product::create($data);

        //Hallamos el ultimo producto guardado en la base de datos
        $lastProduct=product::latest('id')->first();

        //Relacionando el producto junto a las categorias
        // $urldash='\assets\images\productos';
        $urluser='..\..\eCommerceLaravel\public\assets\images\productos';

        //Agregando clasificación de color e imagenes
        if(isset($request->shirtcolor_id)){
            foreach($request->shirtcolor_id as $id_color){


                if(isset($request->image[$id_color]) && $request->hasFile('image')){

                    //Se cambia el nombre del archivo para evitar repetidos y se sube a public
                    $image= time().'.'.$request->image[$id_color]->extension();
                    $request->image[$id_color]->move($urluser, $image);

                    //Se relaciona la categoria y la imagen del producto en caso de imagen
                    $lastProduct->colors()->syncWithoutDetaching(
                        [$id_color => ['image' => $image]]
                    );
                }

                //Se relaciona la categoria y la imagen del producto en caso de no tener imagen
                $lastProduct->colors()->syncWithoutDetaching(
                    [$id_color ]
                );

            }
        }
//------ Agregando clasificación de tamaño ----------------------------
        if(isset($request->shirtsize_id)){

            foreach($request->shirtsize_id as $id_size){

                //Se relaciona el tamaño con el producto
                $lastProduct->sizes()->syncWithoutDetaching(
                    [$id_size => ['stock' => $request->stocksize[$id_size]]]
                );
            }
        }
//------ Agregando clasificación de impresión ----------------------------
        if(isset($request->typeprint_id)){

            foreach($request->typeprint_id as $id_print){

                //Se relaciona el tamaño con el producto
                $lastProduct->prints()->syncWithoutDetaching(
                    [$id_print]
                );
            }
        }

//------ Agregando clasificación de tipo --------------------------------
        if(isset($request->shirttype_id)){
            foreach($request->shirttype_id as $id_type){

                //Se relaciona el tipo con el producto
                $lastProduct->types()->syncWithoutDetaching(
                    [$id_type]
                );
            }
        }

//------ Agregando clasificación de categoria --------------------------------
        if(isset($request->category_id)){
            foreach($request->category_id as $id_category){
                //Se relaciona la categoria con el producto
                $lastProduct->categories()->syncWithoutDetaching(
                    [$id_category]
                );
            }
        }
//------ Agregando clasificación de descuento --------------------------------
        if(isset($request->descountsetting_id)){
            foreach($request->descountsetting_id as $id_descount){
                //Se relaciona el descuento con el producto
                $lastProduct->descounts()->syncWithoutDetaching(
                    [$id_descount => ['price' => $lastProduct->price]]
                );
            }
        }

        $lastProduct->update();

        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product::find($id);
        $color=Shirtcolor::all();
        $size=Shirtsize::all();
        $type=Shirttype::all();
        $category=Category::all();
        $descount=Descount::all();
        $print=Typeprint::all();

        return view('pages.products.edit', compact('product','color', 'size', 'type', 'category', 'descount', 'print' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data=$request->except('_token');

        //Guardando el producto solamente
        $product=product::findOrFail($id);

        //Relacionando el producto junto a las categorias
        $url='../../eCommerceLaravel/public/assets/images/productos';

        //Agregando clasificación de color e imagenes
        if(isset($request->shirtcolor_id)){
            foreach($request->shirtcolor_id as $id_color){


                if(isset($request->image[$id_color]) && $request->hasFile('image')){
                    $productImage=product::whereRelation('colors', 'id', $id_color)->first();
                    if($productImage->image != ''){
                        unlink($productImage->image, public_path($url));
                    }
                    //Se cambia el nombre del archivo para evitar repetidos y se sube a public
                    $image= time().'.'.$request->image[$id_color]->extension();
                    $request->image[$id_color]->move($url, $image);


                    //Se relaciona la categoria y la imagen del producto en caso de imagen
                    $product->colors()->syncWithoutDetaching(
                        [$id_color => ['image' => $image]]
                    );
                }

                //Se relaciona la categoria y la imagen del producto en caso de no tener imagen
                $product->colors()->syncWithoutDetaching(
                    [$id_color]
                );

            }
        }
//------ Agregando clasificación de tamaño ----------------------------
        if(isset($request->shirtsize_id)){
            foreach($request->shirtsize_id as $id_size){

                //Se relaciona el tamaño con el producto
                $product->sizes()->syncWithoutDetaching(
                    [$id_size => ['stock' => $request->stocksize[$id_size]]]
                );
            }
        }
//------ Agregando clasificación de impresión ----------------------------
        if(isset($request->typeprint_id)){
            foreach($request->shirtsize_id as $id_print){

                //Se relaciona el tamaño con el producto
                $product->prints()->syncWithoutDetaching(
                    [$id_print]
                );
            }
        }

//------ Agregando clasificación de tipo --------------------------------
        if(isset($request->shirttype_id)){
            foreach($request->shirttype_id as $id_type){

                //Se relaciona el tipo con el producto
                $product->types()->syncWithoutDetaching(
                    [$id_type]
                );
            }
        }

//------ Agregando clasificación de categoria --------------------------------
        if(isset($request->category_id)){
            foreach($request->category_id as $id_category){

                //Se relaciona la categoria con el producto
                $product->categories()->syncWithoutDetaching(
                    [$id_category]
                );
            }
        }
//------ Agregando clasificación de descuento --------------------------------
        if(isset($request->descountsetting_id)){
            foreach($request->descountsetting_id as $id_descount){
                //Se relaciona el descuento con el producto
                $product->descounts()->syncWithoutDetaching(
                    [$id_descount => ['price' => $product->price]]
                );
            }
        }




//----- Eliminando clasificación de color, si la quieren eliminar ------------
        if(isset($request->delete_color)){
            foreach($request->delete_color as $id_color){
                $product->colors()->detach($id_color);
            }
        }

//----- Eliminando clasificación de tamaño, si la quieren eliminar ------------
        if(isset($request->delete_size)){
            foreach($request->delete_size as $id_size){
                $product->sizes()->detach($id_size);
            }
        }

//----- Eliminando clasificación de tipo, si la quieren eliminar ------------
        if(isset($request->delete_type)){
            foreach($request->delete_type as $id_type){
                $product->types()->detach($id_type);
            }
        }

//----- Eliminando clasificación de categoria, si la quieren eliminar ------------
        if(isset($request->delete_category)){
            foreach($request->delete_category as $id_category){
                $product->categories()->detach($id_category);
            }
        }

//----- Eliminando clasificación de descuento, si la quieren eliminar ------------
        if(isset($request->delete_descount)){
            foreach($request->delete_descount as $id_descount){
                $product->descounts()->detach($id_descount);
            }
        }

// ----------------- Habilitando o deshabilitando el producto -------------------
        if(!isset($request->state)){
            $product->state=0;
        }
        elseif(isset($request->state)){
            $product->state=1;
        }

        $product->update($request->all());
        return redirect('productos');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $data=product::find($id);
    //     if($data->quantity == 0)
    //     $data->delete();
    //     return redirect('papelera');
    // }

    public function hide(Request $request, $id)
    {
        $data=product::findOrFail($id);
        $data->state=0;
        $data->update();
        return redirect('productos');
    }
}
