<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="miperfil"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Mi perfil'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                               Admin
                            </h5>
                            
                             
                            
                        </div>
                    </div>
                    
                <div class="row">
                  
                    
                        <div class="col-12 col-xl-12">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Información del la tienda</h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="{{ url('miperfil') }}">
                                                <i class="fa fa-reply text-secondary text-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Volver"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                   <form method="post" action="{{ url('editar-aboutus/'.$us['id'].'/'.$text['id'] ) }}">
                                  @csrf
                                  <ul class="list-group">
                                  <div class="mb-3">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                        <strong
                                        class="text-dark">Quienes somos:</strong> &nbsp;</li>
                                    <div class="input-group input-group-outline mt-3">          
                                    <textarea maxlength="500" class="form-control" id="exampleFormControlTextarea1" rows="3" name="aboutus">{{ $text['aboutus'] }}</textarea>
                                    </div>
                                
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Misión:</strong> &nbsp;</li>
                                                <div class="input-group input-group-outline mt-3">          
                                                    <textarea maxlength="500" class="form-control" id="exampleFormControlTextarea1" rows="3" name="mission">{{ $text['mission'] }}</textarea>
                                                    </div>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Visión:</strong> &nbsp; </li>
                                                <div class="input-group input-group-outline mt-3">          
                                                    <textarea maxlength="500" class="form-control" id="exampleFormControlTextarea1" rows="3" name="vision">{{ $text['vision'] }}</textarea>
                                                    </div>
                                       
                                    </ul>
                                    
                                    <hr>
                                   
                                  @csrf
                                  <h6 class="mb-0">Mis datos</h6>

                                    <div class="input-group input-group-outline mt-3">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="name" required
                                            value="{{ $us['name'] }}" pattern="[A-Za-z ]*">
                                    </div>
                                    <div class="input-group input-group-outline mt-3">
                                        <label class="form-label">Apellido</label>
                                        <input type="text" class="form-control" name="lastName" required
                                            value="{{ $us['lastName'] }}" pattern="[A-Za-z ]*">
                                    </div>
                                    <div class="input-group input-group-outline mt-3">
                                        <label class="form-label">Correo</label>
                                        <input type="text" class="form-control" name="email" required
                                            value="{{ $us['email'] }}">
                                    </div>
                                    <div class="input-group input-group-outline mt-3">
                                        <label class="form-label">Celular</label>
                                        <input type="text" class="form-control" name="phone" required
                                            value="{{ $us['phone'] }}">
                                    </div>
                                    <input type="submit" value="Guardar"  class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                                   

                                   </form>
                                </div>
                                
                            </div>
                        </div>
                   </div>   
                </div>
            </div>
                               
                       
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
