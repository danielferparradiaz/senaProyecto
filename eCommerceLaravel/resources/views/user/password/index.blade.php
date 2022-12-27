@extends('user.layouts.index')
@section('title', 'Login')
@section('content')

<script>

let password = document.getElementById('password').value;
let password_confirmation = document.getElementById('password_confirmation').value;
let button = document.getElementById('button');

button.setAttribute('disabled', true);


if(password == password_confirmation){
    button.setAttribute('disabled', false);
}

</script>


    <link rel="stylesheet" href="{{ url('assets/css/login-registro.css')}}">

    <div class="vh-100 d-grid">
        <div class="blur  col-10 col-md-8 col-lg-5 col-sm-8 shadow rounded-2em m-auto">
            <form method="POST" action="{{ route('password.update') }}" >
                <div class="d-grid">

                    @csrf

                    <!-- <a href="/"><i class="bi bi-arrow-left-circle-fill bg-muted fs-1 position-absolute mt-1"></i></a> -->
                    <a href="/"><i class="bi bi-arrow-left fs-2 position-absolute mt-3 ms-3"></i></a>
                    <div class="mb-5 mt-5" >
                        <!-- <h1 class="text-center"><a href="/"><img class="logo-lr pb-4" src="{{ url('assets/images/icon/isotipo1x.svg') }}" alt=""></a></h1> -->
                        <h1 class="fs-lg-1 text-lg-center text-center">Recupera tu contraseña</h1>
                    </div>
                    <div class="col-12 mx-auto">
                        <div class="mb-3 d-flex">
                            <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-envelope text-muted"></i></span>
                            <input required type="mail" name="email" class="form-control ps-5" placeholder="Ingresa tu correo" aria-label="Username" aria-describedby="basic-addon1" autofocus>
                        </div>
						<div class="mb-4 d-flex">
                            <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-lock-fill text-muted"></i></span>
                            <input required id="password" type="password" name="password"  class="form-control ps-5" placeholder="ingresa tu nueva contraseña" aria-label="Username" aria-describedby="basic-addon1">
                        </div>                        
						<div class="mb-4 d-flex">
                            <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-lock-fill text-muted"></i></span>
                            <input required id="password_confirmation" type="password" name="password_confirmation" class="form-control ps-5" placeholder="confirma tu contraseña" aria-label="Username" aria-describedby="basic-addon1">
                            <input type="text" name="token" value="{{$token}}" hidden>
                        </div>                        
						<div class=" row col-md-6 col-sm-6 mx-auto mb-5 container ">
                            <button type="submit" id="button" class="btn btn-primary shadow-sm ">Cambiar contraseña</button>
                        </div>

                    </div>
                   </div>
            </form>
        </div>
    </div>
    <div class="background-login">
        <img src="{{ url('assets\images\background-login-01.svg')}}" alt="">
    </div>


@endsection