@extends('user.layouts.index')
@section('title', 'Carrito')
@section('content')
<br>
<section class="h-100 h-custom mt-5 pt-5" >

    @foreach($data as $bill)
      <div class="container py-5 h-100 shadow rounded-lg" style="background-color: #ffff;">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card">
              <div class="card-body p-4">
                <div class="row">
                  <div class="col-lg-7">
                    <h5 class="mb-3"><a  class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Carrito de compras</a></h5>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div>
                        <p class="mb-0">Tienes {{$bill->orders_count}} Productos en el carrito </p>
                      </div>
                      {{-- <div>
                        <p class="mb-0">
                            <span class="text-muted">
                                Organizar por:
                                <select name="" id="" class="border-0 btn">
                                    <option class="" value="">Precio</option>
                                    <option class="" value="">Tamaño</option>
                                    <option class="" value="">Color</option>
                                </select>
                            </span>
                        </p>
                      </div> --}}
                    </div>

                    {{-- Inicio de card --}}

                    @foreach($bill->orders as $order)
                    @foreach($order->products as $product)
                        @php
                            $details = json_decode($order->detail);
                        @endphp

                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class=" justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <img src="{{ url('assets/images/icon/isotipo1x.svg')}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-2">{{$product->name}}</h5>
                                            @if (strlen($product->description) < 60)
                                                <span class="mb-3">{{ $product->description }} </span>
                                            @else
                                                <p class=" mb-3" title="{{$product->description}}">{{substr($product->description, 0 , 60) . "..." }} </p>
                                            @endif
                                                {{-- <h5 class="fw-normal mb-0 fs-6">${{$product->price}}</h5> --}}
                                                <div class="d-grid">
                                                    <div>
                                                        <span class="pe-1 small">Precio:</span><span class="small">$ {{ number_format($details->product_price, 0, ',', '.')}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="pe-1 small fw-800">Color:</span><span class="small">{{$details->nameColor}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="pe-1 small fw-800">Talla:</span><span class="small">{{$details->nameSize}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="pe-1 small fw-800">Cantidad:</span><span class="small">{{$details->quantity}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="pe-1 small fw-800">Tipo de Camisa:</span><span class="small">{{$details->type}}</span>
                                                    </div>
                                                    <div>
                                                        <span class="pe-1 small fw-800">Tipo de Impresion:</span><span class="small">{{$details->print}}</span>
                                                    </div>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="align-items-center float-start mt-3">
                                        <div style="width: 140px;" class="d-flex align-items-center gap-2">
                                            <span>Total:</span>
                                            <span>$</span>
                                            <h5 class="fw-normal fs-6  subTotal" >{{number_format(($details->quantity * $details->product_price) , 0 , ',', '.'); }}</h5>
                                            {{-- <input type="number" name="quantity" class="col-6 quantity" value="{{$details->quantity}}" maxlength="11" min="1" > --}}
                                            {{-- <input type="hidden" class="productId" value="{{$product->id}}"> --}}
                                        </div>
                                    </div>

                                    <div class="float-end">
                                        <a href="{{ url('/carrito/remover/'.$product->id) }}" class="btn btn-outline-dark mt-2"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endforeach
                    {{-- Fin de Card --}}
                  </div>
                  <div class="col-lg-5 ">
                    <div class="card text-white rounded-3 shadow-sm bg-light">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h5 class="mb-0 text-dark">Sección de pago</h5>
                          <i class="fa-solid fa-circle-user d-sm-none d-lg-block d-md-block iconuser" style="color:{{session('avatar')}}"></i>
                        </div>

                        <hr class="my-4">
                        <div class="d-flex justify-content-between ">
                          <p class="mb-2">Subtotal</p>
                          <p class="mb-2" id="subTotal">$ {{ number_format($bill->subTotalCop , 0  , ',', '.'); }}</p>
                          {{-- <p class="mb-2" id="subTotal"> $ {{ number_format($bill->subTotal , 0 , ',', '.'); }}</p> --}}
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total(USD)</p>
                          <p class="mb-2">$ {{ number_format($bill->subTotal , 2  , '.', ','); }}</p>
                        </div>





                        <!-- <button type="button" class="btn btn-info btn-block btn-lg">
                          <div class="d-flex justify-content-between">
                            <span>$</span>
                            <span>Comprobar<i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                          </div>
                        </button> -->

                        <div>
                          <div id="paypal-button-container"></div>
                        </div>








                      </div>
                    </div>

                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
</section>

<script>
{{--
  //   $('.quantity').change(function(){

  //     var id  = $(this).parent().find('.productId').val();
  //     var cant = $(this).val();

  //     $.get('/carrito/actualizar/' + id + '/' + cant, function (data){
  //       document.querySelector('.subTotal').innerHTML = Intl.NumberFormat('es-ES').format(data);
  //     })

  // });
--}}


</script>


<script src="https://www.paypal.com/sdk/js?client-id=ARqoUskZaVu_BabyP3SNAQbDHhCtw7nPGoWOjBFWuccA9fd4n9cnFZvprIqyd9U2o6gpDicf_SY5qfjN&currency=USD"></script>

<script>


paypal.Buttons({

        style:{
          layout: 'horizontal',
          color: 'silver',
          shape: 'pill',
          tagline: false,
          label: 'pay',
        },


        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{ number_format($bill->subTotal , 2  , '.', ''); }}' // Can also reference a variable or function
              }
            }]


          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: \n\nCompletada, tu numero de orden es ${transaction.id}`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');



</script>

@endsection
