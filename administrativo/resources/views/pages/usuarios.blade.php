<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="usuarios"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Usuarios"></x-navbars.navs.auth>
            <!-- End Navbar -->

            <div class="container-fluid py-4">
                <div class="col-1 text-end" style="margin-bottom: 1rem;">
                    <button onclick="window.print()" class="btn btn-outline-primary btn-sm mb-0">Imprimir</button>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Usuarios</h6>
                                     </div>

                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0 pb-5 ">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nombre</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Correo</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Telefono</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                     {{-- <div class="col-lg-12 col-5 my-auto text-end"> --}}Rol</th>
                                                <th>
                                                <div class="dropdown float-lg-end pe-4">
                                        <div class="dropdown float-lg-end pe-4">
                                           <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                               aria-expanded="false">
                                               <i class="fa fa-filter text-secondary"></i>
                                           </a>
                                           <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                               aria-labelledby="dropdownTable">
                                               <li><a class="dropdown-item border-radius-md" href="{{ url('usuarios-restringidos' ) }}">Restringidos</a>
                                               </li>
                                               {{-- <li><a class="dropdown-item border-radius-md" href="javascript:;">no</a></li> --}}

                                           </ul>
                                       </div>
                                      </div>
                                            </th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        @if(isset($users))

                                        <tbody>
                                            @foreach($users as $usuario)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="user1">
                                                        </div>
                                                         <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $usuario->name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $usuario->lastName }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $usuario->email }}</p>
                                                    {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                                </td>
                                                {{-- <span class="badge badge-sm bg-gradient-success"> --}}
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $usuario->phone }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $usuario->rol }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ url('restringir-usuarios/'.$usuario['id'] ) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <i class="material-icons opacity-10"  data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Restringir usuario">do_not_disturb_on</i>
                                                    </a>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>

                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">



                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
