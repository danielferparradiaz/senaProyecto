@extends('user.layouts.index')
@section('title', 'Home')
@section('content')


    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner carousel-products espacio" id="top">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb ban-1">
                            <div class="inner-content">
                                <h4 class="">Ahora tendras tu prenda favorita!</h4>
                                <span>Prueba nuestros sistema de diseños personalizados</span>
                                <div class="main-border-button">
                                    <a href="/contactanos">Escribenos</a>
                                </div>
                            </div>
                            <img src="" alt="" class="banner-1" id="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            @foreach ($category as $categories)
                                @if ($categories->id <= 3)
                                    <div class="col-lg-6">
                                        <div class="right-first-image">
                                            <div class="thumb">
                                                <div class="inner-content">
                                                    <h4>{{ ucfirst($categories->name) }}</h4>
                                                    <span>{{ $categories->description }}</span>
                                                </div>
                                                <div class="hover-content">
                                                    <div class="inner">
                                                        <h4>{{ ucfirst($categories->name) }}</h4>
                                                        <p>{{ $categories->description }}</p>
                                                        <div class="main-border-button">
                                                            <a href="/categoria/{{ $categories->name }}">Ver más</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="{{ url('assets/images/categorias/' . $categories->image) }}"
                                                    class="banner-2">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Otros</h4>
                                            <span>Soprendete con nuestros productos!</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Otros</h4>
                                                <p>Soprendete con nuestros productos!</p>
                                                <div class="main-border-button">
                                                    <a href="{{ url('categorias/') }}">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ url('assets/images/default/defaultcategory.jpg') }}" class="banner-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Carousel Area Starts ***** -->
    @php
        $pro = '';
    @endphp

    {{-- @endisset --}}
    @foreach ($category as $categories => $category)
        @php
            $limitProduct = count($category->products) <= 8 && count($category->products) >= 4;
        @endphp
        @if ($limitProduct)
            <section class="section carousel-products">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="section-heading">
                                <h2>Mejores productos en {{ $category->name }}</h2>
                                <span>Los mejores estampados para {{ $category->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="men-item-carousel">
                                <div class="owl-men-item owl-carousel">

                                    @foreach ($category->products as $product)
                                        @php
                                            $rand = rand(0, count($product->colors) - 1);
                                        @endphp
                                        @foreach ($product->colors as $key => $img)
                                            @if ($rand == $key)
                                                <div class="item bg-white p-3 pb-4 rounded shadow-sm">
                                                    <div class="thumb">
                                                        <div class="hover-content">
                                                            <ul>
                                                                <li>
                                                                    <a href="{{ '/' . 'categoria/' . $category->name . '/' . str_replace(' ', '-', strtolower($product->name)) }}">
                                                                        <i class="fa fa-eye mt-3"></i>
                                                                    </a>
                                                                </li>
                                                                {{-- <li><a href="/producto"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                                            </ul>
                                                        </div>
                                                        <img src="{{ url('assets/images/productos/' . $img->product_color->image) }}" alt="" class="pd-carousel">
                                                    </div>
                                                    <div class="down-content bg-transparent">
                                                        <h4 class="pe-3">{{ $product->name }}</h4>
                                                        <span class="fs-6">$
                                                            {{ number_format($product->price, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach



@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


<script>
$( document ).ready(function() {

    var arreglo = ["001.jpg", "002.jpg","003.jpg","004.jpg","005.jpg","006.jpg","007.jpg","008.jpg"];
    let ranodm = arreglo[Math.floor(Math.random() * arreglo.length)];
    let urlf = " {{ url('assets/images/categorias')}}"+'/'+ranodm;


    $('#img').attr('src',urlf);




    // segundo for
    // for(var item = 0; item < arreglo.length ; item++){
    //     var parrafo = document.createElement("p");
    //     parrafo.innerHTML = NuevoArreglo[item];
    //     listaImagenes.appendChild(parrafo);
    // }

});
</script>
