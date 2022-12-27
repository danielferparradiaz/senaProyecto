<?php

namespace App\Http\Controllers;

use App\Models\signup;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.signup.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check($type, $data)
    {
        $request = profile::select($type)->where( $type , $data)->get();
        $ans = 0;
        if(isset($request[0]->$type)){
            $ans = 1;
        }else{
            $ans = 0;
        }

        echo($ans);
        // dd($request->toArray());

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request;

        $user = new signup;

            $user->name = ucwords($data['name']);
            $user->lastName = ucwords($data['lastName']);
            $user->email = $data['email'];
            $user->avatar = $data['avatar'];
            $user->rol_id = 2;
            $user->password = Hash::make($data['password']);
            $user->phone = $data['phone'];
            $user->birthdate = $data['birthDay'];
            $user->dni = $data['dni'];
            $user->save();

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = Auth::user();
                session(['id' => "{$user['id']}"]);
                session(['name' => "{$user['name']}"]);
                session(['avatar' => "{$user['avatar']}"]);
/*
                if(signup::where('email', '=', $credentials['email'])->exists()){
                    $message = 'El usuario esta registrado';
                    return view('/', compact('message'));
                }
*/
                return redirect()->intended('/');

            }else{
                return redirect('/');
            }


    }


}
