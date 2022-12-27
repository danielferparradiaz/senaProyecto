<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <title> Ping - @yield('title')</title>

        <link rel="icon" href="{{ url('assets/images/icon/isotipo1x.svg') }}" type="image/x-icon">

        <!-- CSS & JS Files Start-->
            {{-- imported from the web --}}
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" >
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
            {{-- imported from the web --}}

            <link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/templatemo-hexashop.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/home/banner.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/home/carousel1.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/about-us/about-us.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/fonts-reset.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/global-styles.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/owl-carousel.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/lightbox.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/header-footer/header.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/header-footer/footer.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/shopping-car/car.css')}}">
            <link rel="stylesheet" href="{{ url('assets/css/product.css')}}">

            <script src="{{ url('assets/js/sweetalert.js')}}"></script>

            <style>
                a.textfloat:hover::after {
                    content: "Perfil";
                    position: absolute;
                    font-size: 12px;
                    top: 130%;
                    left: -30px;
                    padding: 0 40px;
                    border-radius: 1em;
                    border: 1px solid white;
                    color: #f0f0f0;
                    background-color: #3d3d3d;
                }

                .iconuser{
                    font-size: 45px;
                }

                @media(max-width: 576px ){
                    .iconuser{
                        font-size: 0;
                        color: {{session('avatar')}};
                    }

                }
            </style>

        <!-- CSS & JS Files End-->

    </head>
<body class="text-bg-light">

        <!-- ***** Preloader Start ***** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        <!-- ***** Preloader End ***** -->
        <header class="header-area header-sticky shadow-sm position-fixed">
            <div class="mx-lg-5 mx-0 mx-sm-0 mx-md-5">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                                <a href="/" class="logo">
                                    <div class="logoPingCont d-grid">
                                        <div class="rounded-4 d-flex pe-3 px-3">
                                            <img class="logoPing pe-2" src="{{ url('assets/images/icon/isotipo1x.svg')}}">
                                            <img class="logoPing" src="{{ url('assets/images/icon/logotipo1x.svg')}}">
                                        </div>
                                    </div>
                                </a>
                            <!-- ***** Logo End ***** -->

                            <!-- ***** Menu Start ***** -->
                                <ul class="nav">

                                    <li>
                                        <a>
                                            <button type="button" class="btn btn-outline-ping search-bg" data-bs-toggle="modal" data-bs-target="#buscar" onclick="modalBuscar()">
                                                <span class="font"> Buscar </span>
                                            </button>
                                        </a>
                                    </li>


                                    <li class="submenu font">

                                        <a href="javascript:;" class="">
                                            Ver más
                                            <i class="down ms-4"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="/categorias">
                                                    <i>
                                                        <img src="{{ url('assets/images/icon/border-all.svg')}}" width="14px" class="mx-2" alt="">
                                                    </i>
                                                    Categorias
                                                </a>
                                            </li>
                                            @if(Auth::check())
                                            <li>
                                                <a href="/carrito">
                                                    <i>
                                                        <img src="{{ url('assets/images/icon/cart2.svg')}}" width="14px" class="mx-2" alt="">
                                                    </i>
                                                    Carrito
                                                </a>
                                            </li>
                                            @endif

                                            @unless(Auth::check())
                                            <li>
                                                <a href="/registro">
                                                    <i>
                                                        <img src="{{ url('assets/images/icon/iconUser.svg')}}" width="14px" class="mx-2" alt="">
                                                    </i>
                                                    Registrate
                                                </a>
                                            </li>
                                            @endunless

                                            <li>
                                                <a href="/contactanos#contactUs">
                                                    <i>
                                                        <img src="{{ url('assets/images/icon/person-lines-fill.svg')}}" width="14px" class="mx-2" alt="">
                                                    </i>
                                                    Contactanos
                                                </a>
                                            </li>

                                            @auth
                                            <li>
                                                <a href="/logout">
                                                    <i class="bi bi-box-arrow-left mx-2 "></i>
                                                    Salir
                                                </a>
                                            </li>
                                            @endauth

                                        </ul>
                                    </li>

                                    @if(Auth::check())
                                    <li>
                                        <a href="{{"/perfil"}} " title="" class="textfloat">
                                            <i class="fa-solid fa-circle-user d-sm-none d-lg-block d-md-block iconuser" style="color:{{session('avatar')}}"></i>
                                            <span class="d-lg-none d-md-none">
                                                Ingresa a tu perfil
                                            </span>
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="/login" title="">
                                            <i class="fa-solid fa-circle-user d-sm-none d-lg-block d-md-block iconuser"></i>
                                            <span class="d-lg-none d-md-none font">
                                                Ingresa
                                            </span>
                                        </a>
                                    </li>
                                    @endif

                                </ul>

                                <a class='menu-trigger'>
                                    <span>Menu</span>
                                </a>

                            <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        @extends('user.layouts.modal')


        <!-- ***** content ***** -->
            @yield('content')
        <!-- ***** content ***** -->

        @extends('user.layouts.footer')


        <!-- Plugins -->

            <script src="{{ url('assets/js/owl-carousel.js')}}"></script>
            <script src="{{ url('assets/js/accordions.js')}}"></script>
            <script src="{{ url('assets/js/datepicker.js')}}"></script>
            <script src="{{ url('assets/js/scrollreveal.min.js')}}"></script>
            <script src="{{ url('assets/js/imgfix.min.js')}}"></script>
            <script src="{{ url('assets/js/slick.js')}}"></script>
            <script src="{{ url('assets/js/lightbox.js')}}"></script>
            <script src="{{ url('assets/js/isotope.js')}}"></script>
            <script src="{{ url('assets/js/quantity.js')}} "></script>
            <script src="{{ url('assets/js/custom.js')}}"></script>


            <script>

                $('.modal').on('shown.bs.modal', function() {
                    $(this).css("z-index", parseInt($('.modal-backdrop').css('z-index')) + 1);
                });

                $(function() {
                    var selectedClass = "";
                    $("p").click(function(){
                    selectedClass = $(this).attr("data-rel");
                    $("#portfolio").fadeTo(50, 0.1);
                        $("#portfolio div").not("."+selectedClass).fadeOut();
                    setTimeout(function() {
                    $("."+selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                    }, 500);

                    });
                });

                function modalBuscar(){
                    // mo
                }


            </script>
            <script>





                $('#helpwha').click(function(){

                    let num = '+573158559229';
                    let msg = 'Hola, necesito hacer una consulta';

                    var win = window.open(`https://wa.me/${num}?text=${msg}`, '_blank');

                });

            </script>
    <!-- Plugins -->

</body>
</html>
