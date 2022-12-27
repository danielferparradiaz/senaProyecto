@extends('user.layouts.index')
@section('title', 'Registro de usuarios')
@section('content')
<link rel="stylesheet" href="{{ url('assets/css/login-registro.css')}}">

<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
label[for="avatar"]{
    /* width: 100%; */
    height: 35px;
    cursor: pointer;
    border-radius: .4em;
}
div.avatar{
    margin-bottom: 1em;
    padding: 5px 5px 5px 8px;
    border-radius: .4em;
    border: 1px dashed #00000030;
}
div.avatar label {
    font-size: 30px;
}
</style>




<div class="d-grid mt-5">
        <div class="blur col-10 col-md-8  col-lg-5 col-sm-8 shadow rounded-2em m-auto">
                <form method="POST" action="{{ route('save') }}">
                    @csrf
                    <div class="d-grid">
                    <a href="/"><i class="bi bi-arrow-left fs-2 position-absolute mt-3 ms-3"></i></a>
                        <div class="mb-5 mt-5" >
                            <h1 class="fs-lg-1 text-lg-center text-center">Registrate</h1>
                        </div>
                        <div class="col-12 mx-auto">
                                    <div class="avatar">
                                        <div class="d-flex gap-2">
                                            <label for="avatar"  style="">
                                                <i id="avatarview" class="fa-solid fa-circle-user" style="color:#000000" ></i>
                                            </label>
                                            <input type="color" name="" id="avatar" hidden>
                                            <span class="text-muted my-auto">Selecciona el color de tu avatar</span>
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-person-fill text-muted"></i></span>
                                        <input required type="text" class="form-control ps-5" name="name" id="name" placeholder="Nombres" aria-label="Username" aria-describedby="basic-addon1" autofocus pattern="[A-Za-z- ]*" maxlength="50">
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-person-fill text-muted"></i></span>
                                        <input required type="text" class="form-control ps-5" name="lastName" id="lastName" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1" pattern="[A-Za-z- ]*" maxlength="50">
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-envelope text-muted"></i></span>
                                        <input required type="mail" class="form-control ps-5" name="email" id="email" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1" maxlength="255" id="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-telephone-fill text-muted"></i></span>
                                        <input required type="tel" class="form-control ps-5" name="phone" id="phone" placeholder="Teléfono" maxlength="10" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-person-fill text-muted"></i></span>
                                        <input required type="text" class="form-control ps-5" placeholder="Tipo de documento" aria-label="Username" value="Cedula de ciudadania" aria-describedby="basic-addon1" autofocus disabled>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-person-fill text-muted"></i></span>
                                        <input required type="number" class="form-control ps-5" id="dni" name="dni" placeholder="Numero de documento" maxlength="10"  aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class="bi bi-lock-fill text-muted"></i></span>
                                        <input required type="password" class="form-control ps-5" name="password" id="password" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="mb-4 d-flex">
                                        <span class="bg-transparent input-group-text border-0 position-absolute" id="basic-addon1"><i class= "bi bi-calendar-event text-muted"></i></span>
                                        <input type="date" onclick="fecha()" id="date" name="birthDay" class="form-control ps-5" placeholder="mm/dd/yyyy" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class=" row col-md-6 col-sm-6 mx-auto mb-5 container ">
                                        {{-- <input type="button" class="btn btn-primary shadow-sm " value="Registrate" id="send" > --}}
                                        <input type="submit" class="btn btn-primary shadow-sm " value="Registrate" id="send" >
                                    </div>
                                </div>
                                <div class="container mb-5">
                                    <a>Ya tienes una cuenta?</a>
                                    <a href="/login" class="text-primary">Inicia sesión</a>
                                </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>


    <div class="background-login">
        <img src="{{ url('assets\images\background-login-01.svg')}}" alt="">
    </div>


<script>



$('#avatar').change(function (e){
    $('#avatarcol').attr("value", $('#avatar').val());
    $('#avatarview').css('color', $('#avatar').val());
})

function fecha(){

    let date = document.getElementById('date');
    date.setAttribute('type', 'date');
    date.setAttribute('max', '2004-12-31');
}

    function email(){
        let text = $('#email').val();
        let texto = "Este correo ya está registrado";
        if(!text == "" ){
            querydata('email' , text, texto);
        }
    }
    function dni(){
        let text = $('#dni').val();
        let texto = "Esta identificación ya está registrada";
        if(!text == ""){
            querydata('dni' , text, texto);
        }
    }

    $('#email').focusout(function (e) {
        email();
    });

    $('#email').on('input',  function (e) {
        email();
    });

    $('#dni').focusout( function (e) {
        dni();
    });

    $('#dni').on('input',function (e) {
        dni();
    });

    function querydata(type, data, texto){
        $.ajax({
            type: 'GET',
            url: '/registro/' + type + '/' + data,
            contentType: 'application/json',
            async: true,
            success: function(data){
                if(data == 1){
                    dataAlertMessage(texto, 'info', 'bottom-end', 2000);
                }
            }, error:function(error){
                let texto = "Error";
                dataAlertMessage(texto, 'error', 'bottom-end', 2000);
            }

        });
    }

</script>

@endsection
