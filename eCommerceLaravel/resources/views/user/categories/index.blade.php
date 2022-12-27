@extends('user.layouts.index')
@section('title', 'Categorias')
@section('content')
<style>
    .section-heading span{
        text-shadow: 0 0 0px #000000 !important;
    }
    .main-banner{
        padding-top: 0px !important;
    }
</style>
<!-- ***** Categories Area Start ***** -->
<div class="espacio" id="top">
    <section class="section" id="products">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>CATEGORIAS</h2>
                        <span>Ropa para todas las edades</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-banner mt-5" id="top">
            <div class="container">
                <div class="col-md-12">
                    <div class="right-content">
                        <div class="row">

                        @foreach($data as $category)
                            <div class="col-lg-4">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>{{ $category->name}}</h4>
                                            <span>{{ $category->description }}</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>{{ $category->name}}</h4>
                                                <p>{{ $category->description }}</p>
                                                <div class="main-border-button">
                                                    <a href="{{ url(strtolower ('categoria/' . $category->name)) }}">Ver Productos</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if($category->image)
                                        <img src="{{ url('assets/images/categorias/'.$category->image)}}">
                                        @else
                                        <img src="{{ url('assets/images/categorydefault.jpg')}}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
         </div>
     </div>
    </section>

</div>
<!-- ***** Categories Area Ends ***** -->

@endsection
