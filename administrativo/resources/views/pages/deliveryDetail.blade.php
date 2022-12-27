<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="ventas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Ventas"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8">
                    <p>Detalles de entrega:</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-12 d-flex fs-4 my-auto mb-2 " style="margin-top: 1rem;">
                                    <h5 class="mb-0 col">Producto</h5>
                                    <h5 class="mb-0 col">Cantidad</h5>
                                    <h5 class="mb-0 col">Color</h5>
                                    <h5 class="mb-0 col">Tamaño</h5>
                                    <h5 class="mb-0 col">Tipo</h5>
                                    <h5 class="mb-0 col">Impresión</h5>
                                    <h5 class="mb-0 col">Sub Total</h5>
                                </div>
                                <hr>

                            </div>
                        </div>
                        <div class="card-body p-3 pb-0">

                        @foreach($data as $key => $venta)
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex col">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$details[$key]->nameproduct}}</h6>
                                    </div>
                                    <div class="d-flex col text-center">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm col-8">{{$venta->quantity}}</h6>
                                        <span class="text-xs"></span>
                                    </div>
                                    <div class="d-flex col">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$details[$key]->nameColor}}</h6>
                                        <span class="text-xs"></span>

                                    </div>
                                    <div class="d-flex col">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$details[$key]->type}}</h6>
                                        <span class="text-xs"></span>

                                    </div>
                                    <div class="d-flex col">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$details[$key]->print}}</h6>
                                        <span class="text-xs"></span>

                                    </div>
                                    <div class="d-flex col text-center">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$details[$key]->nameSize}}</h6>
                                        <span class="text-xs"></span>

                                    </div>

                                    <div class="d-flex col">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$venta->product_price}}</h6>
                                        <span class="text-xs"></span>

                                    </div>

                                </li>

                            </ul>
                            <hr>
                            @endforeach


                        </div>
                        <div class="card-footer pb-0 p-3">
                        <div class="col-12 text-end" style="margin-bottom: 1rem;">
                                    <button class="btn btn-outline-primary btn-sm mb-0" onclick="window.print();">Imprimir</button>

                                </div>

                        </div>
                    </div>
                </div>
            </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
