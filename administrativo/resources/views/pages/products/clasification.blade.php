<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <title>clasifcacion</title>
   
    <x-navbars.sidebar activePage="productos"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="clasificaciones"></x-navbars.navs.auth>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <div class="row col-12">
                    <h6 class="mb-0 col-2">Clasificaciones</h6>                                                            
                    <a href="{{ route('productos') }}" class='col-2'>
                        <button class='btn btn-secondary'>Regresar</button>
                    </a>                    
                </div>
                </div>
                <div class="row col-12">                    
                    <div class="card-body px-5 pb-2 row">
                        <div class="col input-group-outline mt-3 col">
                            <label class="form-label text-dark">                                                            
                                <button class="btn btn-outline-info btn-sm">Colores</button>
                        </label>
                            <hr>
                        @foreach($color as $c)
                            <div class="form-check" >                                
                                <label for='{{ $c->id }}' style="color: {{ $c->color }}" class="form-label text-outline-dark text-shadow 001px 3px #00000055"> {{ $c->name }}</label>                            
                            </div>              
                        @endforeach                        
                        </div>
                    <div class="col input-group-outline mt-3">                        
                        <label class="form-label text-dark">                                                                                        
                                <span class="btn btn-outline-info btn-sm">Tamaños</span>
                        </label>
                            <hr>
                                @foreach($size as $s)
                                <div class="form-check row">                                    
                                    <label class="form-label col-6"> {{ $s->size }}</label>
                                </div>
                                @endforeach                        
                        </div>                            
                        <div class="col input-group-outline mt-3">
                            <label class="form-label text-dark ">
                                <span class=" btn btn-outline-info btn-sm ">Tipos</span>
                            </label>
                            <hr>
                                @foreach($type as $t)
                                <div class="form-check row">                                    
                                    <label class="form-label col-6"> {{ $t->type }}</label>
                                </div>
                                @endforeach                        
                        </div>                    
                        <div class="col input-group-outline mt-3">
                            <label class="form-label text-dark">
                                <span class="btn btn-outline-info btn-sm">Categorias</span>
                            </label>
                            <hr>
                                @foreach($category as $c)
                                <div class="form-check row">                                    
                                    <label class="form-label col-6"> {{ $c->name }}</label>
                                </div>
                                @endforeach                        
                        </div>                        
                        <div class="col input-group-outline mt-3">
                            <label class="form-label text-dark">
                                <span class="btn btn-outline-info btn-sm">Descuentos</span></a>
                            </label>
                            <hr>
                                @foreach($descount as $d )
                                <div class="form-check row">                                    
                                    <label class="form-label col-6"> {{ $d->descount }} - {{ $d->description }}</label>
                                    </div>
                                @endforeach                        
                        </div>                        
                    </div>                                
                    </div>
                    <div class="card-body">
                        <label class="btn btn-outline-success col-3" id="nuevo">Nueva Clasificación</label>
                        <form action="{{ route('crear-clasificacion') }}" method="post" id="form" style="display: none">
                            @csrf
                        <div class="row">
                            <div class="col-4">
                        <select onchange="change()" class="form-select"  name="class" id="select" >
                            <option value="0" class="btn " selected disabled>--Selecciona la Clasificación--</option>
                            <option id="uno" value="1" class="btn btn-outline-info" >Tamaños</option>
                            <option value="2" class="btn btn-outline-info" >Tipo de Camisa</option>
                            <option value="3" class="btn btn-outline-info" >Colores</option>
                            <option value="4" class="btn btn-outline-info" >Descuento</option>
                            <option value="5" class="btn btn-outline-info" >Categoria</option>
                        </select>
                            </div>
                            <div class="col">
                                <div class="row">

                                <div class="col px-3 input-group input-group-outline mt-3 ">
                                <input type='text' id='text' class='form-control col px-3' required>
                                </div>

                                <div class="col px-3 input-group input-group-outline mt-3 " id="text2" style="display:none">
                                <input type="number" name="descount" id="inputMaster"  class="form-control col px-3" placeholder="Descuento">
                                </div>

                                <div class="col px-3 input-group input-group-outline mt-3 " id="text3"  style="display:none">
                                    {{-- <label for="">Fecha Limite</label> --}}
                                <input type="date" name="applyDate"  class="form-control col px-3" >
                                </div>

                                <div class="col">
                                <input type="submit"  id="" class="col btn btn-success" >
                                </div>
                            </div>
                            </div>
                        </div>
                        </form>
                        <script>
                            var nuevo=document.querySelector("#nuevo");
                            var form= document.querySelector("#form");
                            nuevo.addEventListener("click", () =>{
                                if(form.style.display == "none"){
                                form.style.display="block";
                            }
                            else{
                                form.style.display="none";
                            }
                            });

                            function change(){
                             let select = document.getElementById("select");
                             let text = document.getElementById("text");
                             let text2 = document.getElementById("text2");
                             let text3 = document.getElementById("text3");
                             let InputMaster = document.getElementById("inputMaster");

                             if (select.value == "1"){
                             text.setAttribute('name', "size");
                             text.setAttribute('placeholder', "Nuevo tamaño");

                             }
                             else if (select.value == "2"){
                             text.setAttribute('name', "type");
                             text.setAttribute('placeholder', "Nuevo tipo de camisa");
                             }
                             else if (select.value == "3"){
                             text.setAttribute('name', "name");
                             text.setAttribute('placeholder', "Nuevo color");
                                                         
                             inputMaster.type="color";
                             inputMaster.name="color";                           
                             inputMaster.value="#ff0066";                           
                             text2.style.display="flex";
                             }
                             else if (select.value == "4"){
                             text.setAttribute('name', "description");
                             text.setAttribute('placeholder', "Descripción del descuento");
                             text2.style.display="flex";                             
                             inputMaster.required=true;
                             inputMaster.type="number";
                             inputMaster.name="descount";
                             text3.required=true;
                             text3.style.display="flex";
                             }
                             else if (select.value == "5"){
                             text.setAttribute('name', "name");
                             text.setAttribute('placeholder', "Nueva Categoria");
                             }

                             if(select.value != "4"){

                                if(select.value != "3"){
                                    text3.required=false;
                                    text2.style.display="none";
                            }
                                text2.required=false;
                                text3.style.display="none";
                             }
                             }
                             </script>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
<x-plugins></x-plugins>

</x-layout>