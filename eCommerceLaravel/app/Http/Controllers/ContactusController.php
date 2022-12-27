<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index()
    {
        $data=ContactUs::first();
        $admi=user::where('rol_id',1)->first();
        $phone = json_encode($admi['phone']);

        return view('user.contactus.index',compact('data','admi', 'phone'));

    }

}
