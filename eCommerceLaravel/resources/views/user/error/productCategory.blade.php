@extends('user.layouts.index')
@section('title', ucfirst($name))
@section('content')

<style>
    section{
        background: #fff;
    }
    section::after{
        content: "";
        height: 50%;
        background: #000000;
    }
</style>

<section class="bg-transparent">
    <div class="container m-auto vh-100 d-grid">
        <div class="m-auto d-grid">
            <h1 class="">No hay productos en {{$name}}</h1>
            <a href="/categorias" class="btn btn-outline-secondary px-4 mx-auto mt-3">Volver</a>
        </div>
    </div>
</section>

@endsection
