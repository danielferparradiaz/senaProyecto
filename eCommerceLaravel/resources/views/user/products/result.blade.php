@extends('user.layouts.index')
@section('title', 'Busqueda "'. ucfirst($text) . '"')
@section('content')

<style>
        a:hover{
        text-decoration: underline !important;
        }
        .carousel-products {
            padding-top: 50px !important;
            padding-bottom: 50px !important;
            border-bottom: 3px dotted #eee !important;
        }
</style>

<!-- ***** Products Area Starts ***** -->
    <section class="section espacio pt-5 " id="products">
        <div class="container">
            <section class="section carousel-products">
                {{-- Inicio de enlaces--}}
                <div class="mb-4  float-start fs-6">
                    <a  href="/categorias" class="text-dark">Categorias/</a>
                </div>
                {{-- Fin de enlaces--}}
            </section>

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Resultado de productos con <u><i>"{{$text}}"</i></u></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                {{-- @foreach($data as $products) --}}
                    @foreach($data->colors as $detail)
                        <div class="col-lg-4">
                            <form action="{{url('/carrito/agregar')}}" method="post">
                                @csrf
                                <div class="item bg-white p-3 pb-4 rounded shadow-sm">
                                    <div class="thumb ">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="{{'/categoria' . '/' . strtolower($data->category) . '/' . str_replace(' ' , '-', (strtolower($data->name)))}}"><i class="fa fa-eye"></i></a></li>
                                                <!-- AQUI CARRITO  -->
                                                {{-- <li><a><button type="submit" class="bg-transparent border-0" ><i class="fa fa-shopping-cart"></i></button></i></a></li> --}}
                                            </ul>
                                        </div>
                                        @if(isset($detail->product_color->image))
                                            <img src="{{ url('assets/images/productos/'.$detail->product_color->image) }}" alt="{{ $data->name }} - {{ $detail->name }} ">
                                        @else
                                        {{-- Poner una imagen por defecto aqui, en caso de que no haya imagen --}}
                                            <img src="{{ url('assets/images/') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="down-content bg-transparent">
                                        <input type="hidden" value="{{$data->id}}" name="product_id">
                                        <h4 class="">{{$data->name}}</h4>
                                        <input type="hidden" value="{{$data->price}}" name="product_price">
                                        <span>$ {{ number_format($data->price, 0, ',', '.')}}</span>
                                        <div class="col-5">
                                            <input type="hidden" name="quantity" class="col-12" value=1 maxlength="11">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                {{-- @endforeach --}}


            </div>
        </div>
    </section>
<!-- ***** Products Area Ends ***** -->

@endsection
