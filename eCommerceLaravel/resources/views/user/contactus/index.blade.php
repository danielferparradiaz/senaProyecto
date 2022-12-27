@extends('user.layouts.index')
@section('title', 'Contactanos')
@section('content')

<!-- ***** Subscribe Area Starts ***** -->
<section class="our-services" id="about-us">
    <div class="container" >
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="service-item bg-white rounded ">
                <h4>Sobre nosotros</h4>
                    <!-- <p>Somos una tienda de camisas estampadas<br><br><br></p> -->
                    <p>{{$data['aboutus']}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-item bg-white rounded">
                    <h4>Misión</h4>
                <!-- <p>Ofrecer un servicio eficaz de todo tipo de prendas de buena calidad y en buen estado para satisfacer las necesidades de nuestros clientes.</p> -->
                <p>{{$data['mission']}}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item bg-white rounded">

                        <h4>Visión</h4>
                        <!-- <p>Convertir mi tienda en una de las más conocidas y poder llevar mis productos a todo el país y al extranjero. <br><br> </p> -->
                        <p>{{$data['vision']}}</p>

                </div>
            </div>
        </div>
    </div>
</section>
    <div class="subscribe espacio" >
        <div ></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading" >
                        <h2>Contactanos y estampa tus ideas en tú próxima camisa favorita!</h2>
                        <span>En ping te ofrecemos un servicio personalizado de camisas</span>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-lg-12 d-grid">
                                <textarea name="message" id="wapp-message" placeholder="Dejanos un mensaje" rows="3" cols="70" class="p-3" maxlength="500"></textarea>
                                <div class="">
                                    <label class="btn btn-outline-dark float-right px-5" for="form-submit-wapp"><i class="bi bi-cursor"></i></label>
                                    <input type="" name="" id="form-submit-wapp" class="d-none ">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="col-12">
                        <ul>
                            <li class="d-grid">
                                Disponiblidad:
                                <span>07:30 AM - 9:30 PM</span>
                                <span>Lunes a viernes</span>
                            </li>

                            <li class="d-grid">
                                Email:
                                <span>
                                    <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CllgCJfsctWTqvBXsNCdPVMtFXfLglsMlCQHxcrTHNQQxKsfWNZrSWBpbBKPNLDfKtFRCQQRDpg"target="_blank"><i class="bi bi-envelope"></i>
                                        {{$admi['email']}}
                                    </a>
                                </span>
                            </li>

                            <li class="d-grid">
                                Redes Sociales:
                                <span>
                                    <a href="https://www.instagram.com/estampados_personalizado_1025/" target="_blank"><i class="bi bi-instagram"></i> Instagram</a>
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- ***** Subscribe Area Ends ***** -->

<script>

    $('#form-submit-wapp').click(function(){

        let num = '+573158559229'; 
        let msg = document.getElementById("wapp-message").value;
        // console.log(num)

        var win = window.open(`https://wa.me/${num}?text=${msg}`, '_blank');

    });

</script>

@endsection
