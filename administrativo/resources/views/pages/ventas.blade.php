<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="ventas"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Ventas"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8">
                    <p>Guias de entrega:</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center" style="margin-top: 1rem;">
                                    <h5 class="mb-0 col-4">Referencia</h5>
                                    <h5 class="mb-0 col-4">Direccion</h5>
                                    <h5 class="mb-0 col-5">Metodo de pago</h5>
                                    <h5 class="mb-0 col-4">Fecha de compra</h5>
                                    <h5 class="mb-0 col-5">Fecha de entrega</h5>
                                    <h5 class="mb-0">Total</h5>
                                </div>
                                <hr>
                                
                            </div>
                        </div>
                        <div class="card-body p-3 pb-0">
                            
                        @foreach($ventas as $venta)

                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$venta->bill->orderBase[0]->product->name}}</h6>
                                       <div class="row col-1">
                                           <span class="text-xs col-1">{{$venta->bill->orderBase[0]->quantity}}</span>
                                           </div> 
                                    </div>
                                    <div class="d-flex col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$venta->direction}}</h6>
                                        <span class="text-xs"></span>
                                    </div>
                                    <div class="d-flex col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$venta->bill->paymentmethod->method}}</h6>
                                        <span class="text-xs"></span>

                                    </div>
                                    <div class="d-flex col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$venta->created_at}}</h6>
                                        <span class="text-xs"></span>

                                    </div>
                                    <div class="d-flex col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$venta->updated_at}}</h6>
                                        <span class="text-xs"></span>

                                    </div>
                                    
                                    <div class="d-flex col-1">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$venta->bill->subTotal}}</h6>
                                        <span class="text-xs"></span>

                                    </div>
                                  
                                </li>
                                
                            </ul>
                            <hr>
                      
                            @endforeach  
                            
                         
                        </div>
                        <div class="card-footer pb-0 p-3">
                        <div class="col-12 text-end" style="margin-bottom: 1rem;">
                                    <button class="btn btn-outline-primary btn-sm mb-0" onclick="window.print()">Imprimir</button>
                                    <button class="btn btn-outline-secondary btn-sm mb-0">Limpiar</button>

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
