<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\bill;
use App\Models\OrderBase;


use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View\View     */
    public function index()
    {
        // Se busca aquellas compras que faltan por entregar

        $data = Delivery::whereRelation('bill', 'billState_id', 2)->get();
        return view('pages.sales', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delivered($id)
    {
        // Se establece que la orden fue entregada

        $bill=bill::find($id);
        $bill->billState_id=3;
        $bill->update();

        return redirect(redirect()->getUrlGenerator()->previous());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        // Se muestran los detalles de los productos de la compra y se decodifica el json
        // que contiene esos detalles

        $data= OrderBase::where('bill_id', $id)->get();
        foreach ($data as $key => $detail) {
            $details[$key]=json_decode($detail->detail);
        }
        return view('pages.deliveryDetail', compact('data', 'details'));
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


    public function sales()
    {
        // Se muestran las ventas ya entregadas

        $active=true;
        $data= Delivery::whereRelation('bill','billState_id', 3)->get();
        return view('pages.sales', compact('data', 'active'));
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
