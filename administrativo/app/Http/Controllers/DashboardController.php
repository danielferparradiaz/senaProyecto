<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\bill;


class DashboardController extends Controller
{
    public function index()
    {
        // Se cuentan los totales de:

        $users=User::where('rol_id', 2)->count();
        $bill=bill::where('billState_id', 2, 3)->count();
        $order=bill::where('billState_id',3)->count();
        $product=product::where('state', '>', 0 )->count();
        
        
        // 1. Se hallan las ordenes ya pagadas, incluyendo las entregadas y sin entregar
        // 2. Se hace un array que como inidice son los meses o dias y el valor es el total ganado 
        // en esos tiempos
        // 3. Se relacionan los indices y los valores para que sean leidos por la gráfica

        $data = bill::where('billState_id', 2)->orWhere('billState_id', 3)->orderBy('created_at')->get()->toarray();
        if(count($data) > 0){
            foreach ($data as $venta) {
                @$ventas[date_format( date_create($venta['created_at']), 'M')] += $venta['subTotal'];
            }
            foreach ($data as $saleday) {
                @$sale[date_format( date_create($saleday['created_at']), 'D')] += $saleday['subTotal'];
            }
            
            $meses =  '"' . implode('","',  array_keys($ventas)) . '"'; 
            $ventas =  '"' . implode('","',  $ventas) . '"'; 
            $day =  '"' . implode('","',  array_keys($sale)) . '"'; 
            $sale =  '"' . implode('","',  $sale) . '"'; 
            
            return view('dashboard.index', compact('users','bill','order', 'product', 'meses', 'ventas','sale','day'));
        }
        else{
            $ventas="0,0,0,0,0,0,0,0,0,0,0,0";
            $meses="Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre";
            $sale="50,50,50,50,50,50,50";
            $day="Lunes Martes, Miercoles, Jueves, Viernes, Sábado, Domingo";

            return view('dashboard.index', compact('users','bill','order', 'product', 'meses', 'ventas','sale','day'));
        }
    }

    
}
