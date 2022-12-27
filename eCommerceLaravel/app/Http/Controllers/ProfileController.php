<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


class ProfileController extends Controller
{

    public function forgotPassword(Request $request){

    //dd($request->toArray());


    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );



    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);

    }

    public function resetPassword(Request $request){

   // dd($request->toArray());

    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);


    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {

            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('home')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $profile = profile::where('id', session('id'))->firstOrFail();
        // dd($profile->toArray());
        return view('user.profile.index', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        $profile = Profile::find(session('id'));

        $profile->name = $request->name;
        $profile->lastName = $request->lastName;
        $profile->phone = $request->phone;
        $profile->avatar = $request->avatar;

        session(['avatar' => $request->avatar]);

        $profile->save();

        // dd($request->all());
        // return redirect('/perfil'. "/" . session('id'));

        // dd($profile->toArray());

        // return $request->all();

    }


   }
//
