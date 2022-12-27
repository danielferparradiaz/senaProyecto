<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="productos"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Productos"></x-navbars.navs.auth>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    @if(!isset($active))
                    <h6 class="mb-0 col-2 py-3">Productos Disponibles</h6>
                    @else
                    <h6 class="mb-0 col-2 py-3">Productos No Disponibles</h6>
                    @endif
                    <div class="col-12">
                    @if(!isset($active))
                    <a href="{{ route('papelera-productos') }}" class='px-2 col-2'><button class='btn btn-primary'>Papelera de Productos</button></a>
                    <a href="{{ route('nuevo-producto') }}" class='s col-2'><button class='btn btn-primary'>Nuevo Producto</button></a>
                    <a href="{{ route('clasificaciones') }}" class=' col-2'><button class='btn btn-primary'>Clasficicaciones</button></a>
                    @else
                    <a href="{{ route('productos') }}" class='col-2'><button class='btn btn-primary'>Regresar</button></a>
                    @endif
                    <button class='btn btn-outline-primary col-2' onclick="window.print();">Imprimir</button>
                </div>
                </div>
                <div class="row col-12">
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            @if(isset($data))
                            @foreach($data as $d)
                            <div class="col">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm col">{{ $d->name }}</h6>
                                <span class="mb-2 text-xs">Precio:
                                    <span
                                        class="text-dark ms-sm-2 font-weight-bold">$ {{ $d->price }}</span>
                                    </span>
                                <span class="text-xs">Colores:
                                    @foreach( $d->colors as $color)
                                        <span style='color: {{ $color->color }}'> - {{ $color->name }} </span>
                                    @endforeach
                                </span>
                                <span class="text-xs">Tamaños:
                                    @foreach( $d->sizes as $size)
                                     <span class="text-dark ms-sm-2 font-weight-bold"> - {{ $size->size }} </span>
                                    @endforeach
                                </span>
                                <span class="text-xs">Tipos:
                                    @foreach( $d->types as $type)
                                     <span class="text-dark ms-sm-2 font-weight-bold"> - {{ $type->type }} </span>
                                    @endforeach
                                </span>
                                </span>
                                <span class="text-xs">Categorias:
                                    @foreach( $d->categories as $category)
                                     <span class="text-dark ms-sm-2 font-weight-bold"> - {{ $category->name }} </span>
                                    @endforeach
                                </span>
                                </span>
                            </div>
                            {{-- <div class="row col px-3"> --}}
                            {{-- @foreach($d->colors as $images) --}}
                            {{-- <div class="col-3 px-1" > --}}
                                {{-- <img src="{{url( 'assets/images/productos/' . $images->product_color->image)}}" class="col-12" height="200px" alt="{{ $images->name }}"> --}}
                            {{-- </div> --}}
                            {{-- @endforeach --}}
                        {{-- </div> --}}
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-dark text-gradient px-3 mb-0"
                                    href="{{ url('editar-producto/'.$d->id) }}"><i
                                        class="material-icons text-sm me-2">edit</i>
                                        @if(!isset($active))
                                        Editar
                                        @else
                                        Editar y Recuperar
                                        @endif
                                    </a>
                                    @if(!isset($active))
                                    <a class="btn btn-link text-danger px-3 mb-0" href="{{ url('eliminar-producto/'.$d->id) }}"><i
                                            class="material-icons text-sm me-2">delete</i>Eliminar</a>
                                    @endif
                                </div>
                        </li>
                            </div>
                      @endforeach
                      @endif
                    </ul>
                </div>
                </div>
            </div>
        </div>

    </div>
<x-plugins></x-plugins>

</x-layout>
