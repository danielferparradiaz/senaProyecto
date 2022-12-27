@extends('user.layouts.index')
@section('title', 'Perfil')
@section('content')


{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<style>
  .avatar{
    font-size: 8em;
  }
  label[for="avatar"]{
      padding: 5px;
      border-radius: 100%;
      border: 2px dashed #00000055;
  }
  .fs-7{
      font-size: .9em;
  }
  input#avatar{
    pointer-events: none;
    display: block;
    opacity: 0;
  }
</style>


<script>

function modal(){
    Swal.fire(
      'Revisa tu correo',
        'Enviamos un correo para cambiar tu contraseña',
        'success'
    )
}
</script>


<div class="container pt-5 mt-5">
    <div class="main-body pt-4 ">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                          <label for="avatar">
                            <i class="fa-solid fa-circle-user d-sm-none d-lg-block d-md-block avatar" style="color:{{$profile->avatar}}"></i>
                          </label>
                          <input type="hidden" name="" id="avatar" class="" value="{{$profile->avatar}}">
                        <span class="fs-7 infoAvatar" style="display:none">[Presiona el icono para cambiar el color]</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">

                        <div class="container col-11 my-4">
                            <form method="post" action="{{ url('perfil/update') }}" id="profile" class="d-grid mb-4">
                                @csrf
                                <div class="form-group">
                                    <label class="letra">Nombres:</label>
                                    <input type="text" class="form-control letra" id="name" name="name" aria-describedby="emailHelp" placeholder=""  value="{{$profile->name}}" readOnly required pattern="[A-Za-z- ]*" autocapitalize="words">
                                </div>
                                <div class="form-group">
                                  <label class="letra">Apellidos:</label>
                                  <input type="text" class="form-control letra" id="lastName" name="lastName" aria-describedby="emailHelp" placeholder=""  value="{{$profile->lastName}}" readOnly required pattern="[A-Za-z- ]*" autocapitalize="words">
                                </div>
                                <div class="form-group">
                                    <label class="letra">Correo electronico:</label>
                                    <input type="text" class="form-control letra" id="email" name="email" aria-describedby="emailHelp" placeholder=""  value="{{$profile->email}}" readOnly required>
                                </div>
                                <div class="form-group">
                                    <label class="letra">Número identificación:</label>
                                    <input type="text" class="form-control letra" id="dni" name="phone" aria-describedby="emailHelp" placeholder=""  value="{{$profile->dni}}" readOnly required>
                                </div>
                                <div class="form-group">
                                    <label class="letra">Fecha de cumpleaños:</label>
                                    <input type="date" class="form-control letra" id="birthDate" name="birthDate" aria-describedby="emailHelp" placeholder=""  value="{{$profile->birthDate}}" readOnly required>
                                </div>
                                <div class="form-group">
                                    <label class="letra">Celular:</label>
                                    <input type="text" class="form-control letra" id="phone" name="phone" aria-describedby="emailHelp" placeholder=""  value="{{$profile->phone}}" readOnly required>
                                </div>
                            </form>
                                <div class="col-sm-12">
                                    <button id ="editar" class="btn btn-outline-ping"><i class="bi bi-pen-fill" ></i> Editar</button>
                                    <button id ="cancelar" style="display: none" class="btn btn-outline-ping"><i class="bi bi-x-lg"> Cancelar</i></button>
                                    <button type="button" id ="enviar" style="display: none" class="btn btn-outline-success" form="profile"><i class="bi bi-check2-all" width="1 em" height="1 em"> Enviar</i></button>
                                    {{-- <button type="submit" id ="enviar" style="display: none" class="btn btn-outline-success" form="profile"><i class="bi bi-check2-all" width="1 em" height="1 em"> Enviar</i></button> --}}

                                    <!--Aqui envio el correo para que se le pueda enviar una notificacion al mismo--->
                                    <form method="post" action="{{route('password.email')}}">
                                        @csrf
                                        <button type="submit" onclick="modal()" class="btn btn-outline-ping mt-3"><i class="bi bi-check2-all" width="1 em" height="1 em">Cambiar contraseña</i></a>
                                        <input type="text" name="email" value="{{$profile->email}}" hidden>
                                    </form>
                                </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


    <script>

      let id = {{session('id')}};
      let parametros;
      let color = "";

      $('#avatar').on('change', function(e){
        $('svg.avatar').css('color', $('#avatar').val());
      } );

      $('#editar').click(function (){
          $('#name').removeAttr('readonly');
          $('#lastName').removeAttr('readonly');
          $('#phone').removeAttr('readonly');
          $('#editar').css('display', 'none');
          $('#cancelar').css('display', 'inline-block');
          $('#enviar').css('display', 'inline-block');
          $('#avatar').attr('type', 'color');
          $('span.infoAvatar').css('display', 'block');
      });

      $('#cancelar').click(function (){
          document.querySelector('#name').setAttribute('readonly', true);
          document.querySelector('#lastName').setAttribute('readonly', true);
          document.querySelector('#phone').setAttribute('readonly', true);
          $('#editar').css('display', 'inline-block');
          $('#cancelar').css('display', 'none');
          $('#enviar').css('display', 'none');
          dataAlertMessage("Cancelado", 'info', 'bottom-end', 3000);
          $('#avatar').attr('type', 'hidden');
          $('span.infoAvatar').css('display', 'none');
      });


      function getdata(){
        var name = $('#name').val();
        var lastName = $('#lastName').val();
        var phone = $('#phone').val();
        var avatar = $('#avatar').val();
        var csrf = $('input[name=_token]').val();

        request = {
          "id" : id,
          "name" : name,
          "lastName": lastName,
          "phone": phone,
          "avatar": avatar,
          '_token' : csrf
          };
      }

      $('#enviar').click(function (e) {
        getdata();
        var url = '/perfil/update';
        $.ajax({
          type: "POST",
          url: url,
          data: request,

           success: function(data)
           {
            dataAlertMessage("Actualizado", 'success', 'bottom-end', 2000);
            setTimeout(function(){
                dataAlertMessage("Podrás ver los cambios del Avatar cuando actualices la pagina", 'info', 'bottom-end', 4000);
            }, 4500);
            document.querySelector('#name').setAttribute('readonly', true);
            document.querySelector('#lastName').setAttribute('readonly', true);
            document.querySelector('#phone').setAttribute('readonly', true);
            $('#editar').css('display', 'inline-block');
            $('#cancelar').css('display', 'none');
            $('#enviar').css('display', 'none');
            $('#avatar').attr('type', 'hidden');
            $('span.infoAvatar').css('display', 'none');
          }

       });
      });




    //   let datos = $.ajax({
    //         type:  'post',
    //         data:  data,
    //         url:   'profile.update',
    //         beforeSend: function () {
    //           dataAlertMessage("Procesando información", 'info', 'bottom-end', 3000);
    //         },
    //         success:  function (response) {
    //           dataAlertMessage("Actualizado", 'success', 'bottom-end', 3000);
    //         }
    //       });


        //   $.post("perfil/update/" + id,
        //   {
        //     name: $('#nombre'),
        //     lastName: $('#apellidos'),
        //     phone: $('#celular')
        //   },function(data){
        //     alert(data);
        //   });



      </script>

@endsection
