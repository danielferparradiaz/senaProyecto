@extends('user.layouts.index')
@section('title', ucfirst(strtolower($data['product']->name)) )
@section('content')
<style>
    .img-product{
        overflow: hidden;
    }
    .img-product img{
        width: 100%;
        margin: auto;
        transition: .2s;
    }
    .img-product img:hover{
        transform: scale(1.1);
    }
    label.miniatura{
        height: 60px;
        width: 60px;
        border: 2px solid #2a2a2a55;
        overflow: hidden;
    }
    label.miniatura:hover{
        height: 60px;
        width: 60px;
        border: 2px solid #ff005260;
        box-shadow: 0 0 10px #ff005260;
        overflow: hidden;
    }
    label.miniatura:hover>.imagen{
        width: 80px;
        height: 80px;
    }
    label.miniatura img{
        width: 100%;
        object-fit: cover;
    }

    .color{
        width: 20px;
    }

    #product {
    margin-top: 0px !important;
  }


    <?php foreach ($data['product']->colors as $colors){ ?>
    .colores label[for="c-<?php echo $colors->name; ?>"]{
        background-color: {{$colors->color}};
    }
    <?php } ?>


    .colorActive{
        box-shadow: 0 0 1px 5px #00000040 ;
    }
    .colores label[for^="c-"]{
        width: 30px;
        height: 30px;
        border-radius: 100%;
        border: 1px solid #2a2a2a55;
        cursor: pointer;
        filter: brightness(100%);
    }
    label[for^="c-"]:hover{
        cursor: pointer;
        filter: brightness(95%);
    }

    a:hover{
        text-decoration: underline !important;
    }


</style>
<div class="mt-5 pt-5 container-fluid">
    <div class="mt-4 container-fluid">

        <div class="mb-4 float-start fs-6">
            <a  href="/categorias" class="text-dark">Categorias</a>
            /
            <a  href="/categoria/{{ strtolower($data['product']->categories[0]->name)}}" class="text-dark">{{$data['product']->categories[0]->name}}</a>
            /
            <a class="text-dark">{{str_replace(' ' , '-', strtolower($data['product']->name) )}}</a>
        </div>

        <div class=" d-md-grid d-grid d-lg-flex container-fluid ">

            <div class=" col-lg-6 col-md-10 col-sm-12 col-12 mx-auto d-grid mb-md-5 mb-5">
                <div class="d-flex">
                    <div class="col-10 img-product mx-auto left-images">
                        @php
                            $color = explode('/', ("$_SERVER[REQUEST_URI]"));
                            if(isset($color[4])){ $color = $color[4]; }
                        @endphp
                        <img
                            src=" {{ url('assets/images/productos/'. $data['product']->colors[0]->product_color->image ); }}"
                            alt=""
                            id="imageview">
                    </div>
                </div>
            </div>

            <div class=" col-lg-6 col-md-10 col-sm-12 col-12 mx-auto d-grid ">

                <div class="d-grid bg-white pt-5 rounded shadow-sm p-3">

                    <div class="right-content col-12 col-sm-12 mx-auto">

                        <form action="{{url('/carrito/agregar')}}" method="post" id="product">
                            @csrf
                            <div class="mb-5">
                                <h3 class="mb-2">{{$data['product']->name}}</h3>
                                <span class="price">
                                    ${{number_format($data['product']->price, 0, ',', '.')}}
                                </span>
                            </div>

                            <span>{{$data['product']->description}}</span>

                            <div class="quantity-content">

                                <div class="d-grid mb-3">
                                    <span>Color: <span id="pcolor"></span></span>
                                    <div class="d-flex gap-2 mt-3 colores">

                                        @for ($i = 0; $i < count($data['product']->colors); $i++)
                                            <label
                                                class="shirtColor"
                                                for="c-{{$data['product']->colors[$i]->name}}">
                                            </label>
                                            <input
                                                value="{{ucfirst($data['product']->colors[$i]->name)}}.{{$data['product']->colors[$i]->id}}.{{$data['product']->colors[$i]->product_color->image}}"
                                                type="radio"
                                                name="color"
                                                id="c-{{$data['product']->colors[$i]->name}}"
                                                hidden
                                                required>
                                        @endfor
                                    </div>
                                </div>

                                <div class="d-grid">

                                    <span>Talla: <span id="ptalla"></span></span>
                                    <div class="d-flex gap-2 mt-3">
                                        <div>

                                            @for($i = 0; $i < count($data['product']->sizes); $i++)
                                                <label
                                                    class="btn btn-outline-danger shirtSize"
                                                    for="t-{{$data['product']->sizes[$i]->size}}">
                                                    {{$data['product']->sizes[$i]->size}}
                                                </label>
                                                <input
                                                    type="radio"
                                                    name="talla"
                                                    id="t-{{$data['product']->sizes[$i]->size}}"
                                                    value=" {{$data['product']->sizes[$i]->size}}.{{$data['product']->sizes[$i]->id}}.{{$data['product']->sizes[$i]->pivot->stock}}"
                                                    hidden
                                                    required>
                                            @endfor

                                        </div>
                                    </div>

                                </div>
                                <div class="d-grid d-lg-flex mt-4">
                                    <div class="col-12 col-sm-12 col-lg-6 d-grid">
                                        <span class="fs-6 my-auto">Cantidad:</span>
                                        <div class="d-flex mt-2 ">
                                            <span class="fs-6 text-lg-center text-md-center me-1 quantityStock"></span>
                                            <span class="fs-6 text-lg-center text-md-center"> Unidades disponibles</span>
                                        </div>
                                    </div>
                                    <div class="quantity buttons_added col-6 d-grid">
                                        <div class="mx-lg-auto mx-md-auto">
                                            <input type="button" value="-" class="minus" >
                                            <input type="number" step="1" min="1" max="1" id="quantity" name="quantity" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" disabled >
                                            <input type="button" value="+" class="plus" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="total">
                                <span class="mb-3 fs-4 text-muted" id="totalview">Total : $ {{number_format($data['product']->price, 0, ',', '.')}}</span>
                                <div class="main-border-button text-center ">
                                    <button class="btn text-center btn-outline-dark py-2 px-4" type="button" id="sendcar">Añadir al carrito</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (count($data['moreproducts']) <= 8 && count($data['moreproducts']) >= 4)
    <section class="section carousel-products">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-heading">
                        <h2>Más productos para {{$data['product']->categories[0]->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">

                            @foreach($data['moreproducts'] as $product)
                            @php
                                $rand = rand(0, count($product->colors)-1);
                            @endphp
                                @foreach($product->colors as $key => $img)
                                @if($rand == $key)
                                        <div class="item bg-white p-3 pb-4 rounded shadow-sm">
                                            <div class="thumb">
                                                <div class="hover-content">
                                                    <ul>
                                                        <li><a href="{{'/' . 'categoria/' . $data['product']->categories[0]->name . '/' . str_replace(' ' , '-', (strtolower($product->name)))}}"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                                <img src="{{ url('assets/images/productos/'. $img->product_color->image )}}" alt="" class="pd-carousel">
                                            </div>
                                            <div class="down-content bg-transparent">
                                                <h4 class="pe-3">{{$product->name}}</h4>
                                                <span>$ {{ $product->price}}</span>
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


<script>
    let pColor = $('#pcolor');
    let color = $('#color');
    let item = [];
    let tItem = [];
    let total = "";
    var detail = [];
    var sesion = `{{is_null(session('id'))}}`;
    /*-----------------Get Color-----------------*/
    if ($('input[name="color"]')) {
        document.querySelectorAll('input[name="color"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {
            item = event.target.value;
            item = item.split('.');
            $('#pcolor').html(item[0]);
            let url = `{{ url('assets/images/productos/')}}`;
            let image = `${item[2]}.${item[3]}`;
            $('#imageview').attr('src', `${url}/${image}`);
            console.log(url + image);
        });
    });
    }

    let ShirtColor = document.querySelectorAll('label.shirtColor');
    /* // For each button, register an event listener */
    ShirtColor.forEach(function(elem){
        elem.addEventListener("click", function(e){
            /* // On click, remove the MyClass on ALL buttons */
        ShirtColor.forEach(function(el){
            el.classList.remove("colorActive");
        });
        // Add the class on clicked one
        e.target.classList.add("colorActive");
    })
    })

    /*-----------------Get Size----------------- */

    if ($('input[name="talla"]')) {
        document.querySelectorAll('input[name="talla"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {

            tItem = event.target.value;
            tItem = tItem.split('.');

            $('span.quantityStock').html("(" + tItem[2] + ")");
            $('#quantity').attr('max', tItem[2]);
            $('#ptalla').html(tItem[0]);

            if(tItem[2] > 0){
                $('#quantity').val(1);
                $('#quantity').attr('step', 1);
            }else{
                $('#quantity').val(0);
                $('#quantity').attr('step', 0);
            }
        });
    });
    }
    let shirtSize = document.querySelectorAll('label.shirtSize');
    /* // For each button, register an event listener */
    shirtSize.forEach(function(elem){
        elem.addEventListener("click", function(e){
            /* // On click, remove the MyClass on ALL buttons */
        shirtSize.forEach(function(el){
            el.classList.remove("active");
        });
        // Add the class on clicked one
        e.target.classList.add("active");
    })
    })

    $('#quantity').on('input',  function (e){
        checkquantity();
    });

    $('#quantity').on('change',  function (e){
        checkquantity();
    });

    /*-----------------Verify Quantity----------------- */
    function checkquantity(){

        if(tItem[2] == 0){
            dataAlertMessage(`No hay cantidad disponible`, 'info', 'bottom-end', 1000);
        }
        else if($('#quantity').val() >= (tItem[2]*2)/2){
            dataAlertMessage(`La cantidad maxima es ${tItem[2]}`, 'info', 'bottom-end', 1000);
        }
        total = $('#quantity').val() * ({{$data['product']->price}});
        total = Intl.NumberFormat('es-ES').format(total);
        $('#totalview').html("Total : $" + total);

    }
    /*-----------------Submit----------------- */
    function getdata(){
        var product_id = {{$data['product']->id}};
        var nameproduct = `{{$data['product']->name}}`;
        var idColor = item[1];
        var nameColor = item[0];
        var idSize = tItem[1];
        var nameSize = tItem[0];
        var product_price = {{$data['product']->price}};;
        var quantity = $('#quantity').val();
        var print = `{{$data['product']->typesprint[0]->print}}`;
        var type = `{{$data['product']->type[0]->type}}`;
        var csrf = $('input[name=_token]').val();

            detail= {
                'product_id' : product_id,
                'nameproduct' : nameproduct,
                'idColor' : idColor,
                'nameColor' : nameColor,
                'idSize' : idSize,
                'nameSize' : nameSize,
                'product_price' : product_price,
                'quantity' : quantity,
                'print' : print,
                'type' : type,
                '_token' : csrf
            };
      }

    $('#sendcar').click(function (e) {
        getdata();
        // detail = JSON.stringify(detail);
        var url = '/carrito/agregar';
        if(detail['idColor'] == undefined || detail['idColor'] == null){
            dataAlertMessage('Porfavor selecciona un color', 'error', 'bottom-end', 1500);
        }else if(detail['idSize'] == undefined || detail['idSize'] == null){
            dataAlertMessage('Porfavor selecciona una talla', 'error', 'bottom-end', 1500);
        }else if(tItem[2] < 1){
            $('#totalview').html("Total : $" + 0);
            dataAlertMessage('Porfavor selecciona una talla que tenga productos en stock', 'error', 'bottom-end', 2000);
        }
        else if(sesion){
            dataAlertMessage('Porfavor inicia sesión antes de continuar', 'error', 'bottom-end', 2000);
            setTimeout(function(){
                location.href = "/carrito"
            }, 2000);
        }
        else{
            console.log(sesion);
            $.ajax({
                type: 'post',
                url: url,
                data: detail,
                beforeSend: function () {
                    dataAlertMessage(`Espera`, 'info', 'bottom-end', 1500);
                },
                complete: function () {
                    setTimeout(function(){
                        dataAlertMessagewithconfirm('Desea ir al carrito?', '', 'bottom-end', 5000, 'si', 'seguir aqui');
                    }, 2000);
                },
                success: function (response) {
                    setTimeout(function(){
                        dataAlertMessage(`Guardado en el carrito`, 'success', 'bottom-end', 1000);
                    }, 1000);
                },
                error: function (jqXHR) {
                    dataAlertMessage(`Error`, 'error', 'bottom-end', 1000);
                }

           });
        }

      });


</script>



@endsection
