<?php

namespace App\Http\Controllers;

use App\Models\Delivery;

use App\Models\entregaFecha;
use App\Models\referencia;
use App\Models\fechaCompra;
use App\Models\metodoPago;

use Illuminate\Http\Request;

class GuiasEnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View\View     */
    public function ref()
    {
      
        
        $ventas = Delivery::all();

        // dd($metodoPago);
 
        return view('pages.ventas', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function metodoPago()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dir()
    {
        

       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function show(referencia $referencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function edit(referencia $referencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, referencia $referencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(referencia $referencia)
    {
        //
    }
}
