<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{
    public function payment()
    {
       
 
        $provider = new PayPalClient;
        $provider->getAccessToken();

        $data = json_decode('{
            "intent": "CAPTURE",
            "purchase_units": [
              {
                "amount": {
                  "currency_code": "USD",
                  "value": "100.00"
                }
              }
            ]
        }', true);

        $order = $provider->createOrder($data);

 
        return redirect($response['paypal_link']);
    }
 
    public function cancel()
    {
    }



    public function success(Request $request)
    {
      
    }
}
