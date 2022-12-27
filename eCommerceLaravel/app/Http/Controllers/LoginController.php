<?php

namespace App\Http\Controllers;



use App\Models\signup;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{

    public function index(){
        // if(session('id')){
            // return redirect('/');
        // }else{
            return view('user.login.index');
        // }
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $email = $request->email;
        $email = profile::select('email')->where('email', $email)->get()->first();

        $logeo = 0;

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            $user = Auth::user();
            $logeo = 1;
        //dd($user);

        session(['name' => "{$user['name']}"]);
        session(['email' => "{$user['email']}"]);
        session(['id' => "{$user['id']}"]);


        //   return redirect()->intended('/');

        }else{
            $logeo = 0;
            // return redirect('login');
        }
        if($email){
            $email = 0;
        }else{
            $email = 1;
        }
    $data["verificador"] = $logeo;
    $data["error"] = $email;

    return $data;


}

    public function logout(){

         Session::flush();

          Auth::logout();

        return redirect('/');
    }

}
