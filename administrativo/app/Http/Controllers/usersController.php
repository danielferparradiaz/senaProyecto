<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\aboutUs;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('rol_id', '2')->select('users.*' ,'roles.name AS rol')->join('roles','users.rol_id', '=', 'roles.id')->get();
        return view('pages.usuarios', compact('users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()

    {   
        $text=aboutUs::first();
        $user=User::where('rol_id', '1')->first();
        return view('pages.profile', compact('user', 'text'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $text=aboutUs::first();
        $us=User::where('rol_id', '1')->first();
        return view('pages.editaboutus', compact('text','us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idtext)
    {
        $admin=User::find($id)->update($request->all());
        $text=aboutUs::find($idtext)->update($request->all());
        return redirect('miperfil');
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
   public function restrictUser($id){
    $users=User::findOrFail($id);
    $users->rol_id = 0;
    $users->update();

    return redirect('usuarios');

   }
   public function showrestrictUser(){
    $restrictUser=User::where('rol_id', '0')->select('users.*' ,'roles.name AS rol')->join('roles','users.rol_id', '=', 'roles.id')->get();
    return view('pages.restrictusers', compact('restrictUser'));
   

}

public function quitarRestriccion($id){
    $quit=User::findOrFail($id);
    $quit->rol_id = 2;
    $quit->update();

    return redirect('usuarios-restringidos');
}




}
