<?php

namespace App\Http\Controllers;

use App\Models\Orderbase;
use App\Models\Product;
use App\Models\Bill;
use Illuminate\Http\Request;
use Auth;
use Mockery\Undefined;

class ShoppingcarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=Bill::with("orders")
            ->withCount("orders")
            ->where( "user_id","=", Auth::id())
            ->where("billstate_id", "=", 1)
            ->get();
        // dd($data->toArray());

        if($data != null){
            $data[0]['subTotalCop'] = $data[0]->toArray()['subTotal'];
                $data[0]['subTotal'] = $data[0]->toArray()['subTotal'] * 0.00021;

                    foreach($data as $order){
                        return view('user.shoppingcar.index', compact("data"));
                    }

    }

    else{
        return redirect(redirect()->getUrlGenerator()->previous());
    }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newbill()
    {
       $lastBill=$this->bill();

        if($lastBill == false){

            $bill=Bill::firstOrCreate(['user_id' => Auth::id()]);

        }

        return redirect(redirect()->getUrlGenerator()->previous());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shoppingcar  $shoppingcar
     * @return \Illuminate\Http\Response
     */
    public function show( $shoppingcar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shoppingcar  $shoppingcar
     * @return \Illuminate\Http\Response
     */
    public function order( $shoppingcar)
    {
        $Bill=$this->bill();

        $Bill->billState_id=2;
        $Bill->update();

        $this->newbill();

    }

    public function update(Request $request, $id)
    {
        $Bill=$this->bill();

        $inCar=Orderbase::where('bill_id', '=', $Bill->id)
            ->where('product_id', '=', $id)
            ->first();

        $inCar->quantity=$request->quantity;
        $inCar->product_price=($request->quantity * $inCar->product_price);
        $Bill->subTotal=Orderbase::where('bill_id', '=', $Bill->id)->sum('product_price');

        $Bill->update();
        $inCar->update();

        return redirect(redirect()->getUrlGenerator()->previous());

    }

    public function updateSubtotal ($id, $cant)
    {
        $product = Product::find($id);
        $subtotal = $product->price * $cant;

        $bill = Bill::where('user_id', Auth::id() )->where('billState_id', 1)->first();

        Orderbase::where('bill_id', $bill->id)
            ->where('product_id',  $id)
            ->update(['quantity' => $cant]);

        $bill->update(['subTotal' => $subtotal]);

        echo $subtotal;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shoppingcar  $shoppingcar
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // dd($request)
        // $json = json_decode($request);

        $lastBill=Bill::firstOrCreate(['user_id' => Auth::id()]);

        // $lastProduct=Orderbase::where("product_id", "=", $request->product_id)
        //     ->where("bill_id", "=", $lastBill->id)
        //     ->first();

        // if($lastProduct == null){

            $detail = [
                'product_id' => $request->product_id,
                'nameproduct' => $request->nameproduct,
                'idColor' => $request->idColor,
                'nameColor' => $request->nameColor,
                'idSize' => $request->idSize,
                'nameSize' => $request->nameSize,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'print' => $request->print,
                'type' => $request->type,
            ];

            $insert=new Orderbase;
            $insert->quantity=$request->quantity;
            $insert->product_id=$request->product_id;
            $insert->product_price=($request->product_price * $request->quantity);
            $insert->detail=(json_encode($detail));
            $insert->bill_id=$lastBill->id;
            $insert->save();

            $lastBill->subTotal=Orderbase::where('bill_id', '=', $lastBill->id)->sum('product_price');
            $lastBill->update();

        // }else{

        // $lastProduct->quantity+=$request->quantity;
        // $lastProduct->product_price=($request->quantity * $request->product_price);
        // $lastProduct->update();

        // $lastBill->subTotal=Orderbase::where('bill_id', '=', $lastBill->id)->sum('product_price');
        // $lastBill->update();
        // }

    // session(['shoppingquantity' => "{$data[0]->orders_count}"]);


    // Aqui tambien poner la ruta de donde vino la petición
    // return redirect(redirect()->getUrlGenerator()->previous());

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shoppingcar  $shoppingcar
     * @return \Illuminate\Http\Response
     */


    public function destroy($id){

    $product=Orderbase::where('product_id', '=', $id)->first();
    $product->delete();
    $bill=$this->bill();
    $bill->subTotal=Orderbase::where('bill_id','=', $bill->id)->sum('product_price');
    $bill->update();


     return redirect(redirect()->getUrlGenerator()->previous());

    }


    private function bill(){

        return Bill::where('user_id', "=", Auth::id())
            ->where('billState_id', "=", 1)
            ->first();


    }

}
