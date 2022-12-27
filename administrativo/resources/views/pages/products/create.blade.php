<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="productos"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Agregar Nuevo Producto"></x-navbars.navs.auth>
        <!-- End Navbar -->

    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Nueva Producto</h6>
            </div>
        </div>                            
                            
        <form action="{{ route('nuevo-producto') }}" method="post" enctype="multipart/form-data">
            @csrf    
            <div class="card-body px-5 pb-2 col-12 row">

                <div class="input-group input-group-outline mt-3 px-4 col justify-content-end">
                    <input type="submit" class="btn btn-primary" value="Ingresar Producto Nuevo">
                </div>
            <div class="card-body px-5 pb-2 col-12 row">
                <div class="container col">
                <div class="input-group input-group-outline mt-3 ">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" maxlength="50" required>
                </div>
            </div>
            <div class="container col">
                <div class="input-group input-group-outline mt-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="description" maxlength="200">
                </div>
            </div>
        </div>
        <div class="card-body px-5 pb-2 col-12 row">
            <div class="container col py-3">
                <div class="input-group input-group-outline mt-3">
                    <label class="form-label">Precio</label>
                    <input type="number" class="form-control" name="price" maxlength="11" required>
                </div>
            </div>
            <div class="container col">
                <div class="container col-4 py-3 shadow p-3 mb-5 bg-white rounded">
                    <div class="form-check">
                        <label class="text-dark">Disponible</label>
                        <input type="checkbox" name="state" class="form-check-input"  value="1" checked>
                    </div>
                    </div>
                </div>
                <div class="container col py-3">
                <div class="input-group input-group-outline mt-3">
                    <label class="form-label">Garantia</label>
                    <input type="number" class="form-control" name="garanty" maxlength="11">
                </div>
                </div>
            </div>
            <div class="card-body px-5 pb-2">
                <div class="row">
                <div class=" input-group-outline mt-3 col shadow p-3 mb-5 bg-light rounded">
                    <label class="form-label text-dark">Color</label>
                    <hr>
                @foreach($color as $c)
                <div class="container col py-3 shadow p-3 mb-5 bg-white rounded">
                    <div class="form-check">
                        <input class="form-check-input shirtcolor" value="{{ $c->id }}" type="checkbox" name="shirtcolor_id[{{ $c->id }}]" >
                        <label for='{{ $c->id }}' class="form-label" style='color: {{ $c->color }}'> {{ $c->name }}</label>                            
                    </div>
                    <div class=" input-group-outline mt-3 " id="image[{{ $c->id }}]" style="display: none">
                        <input type="file" class="btn btn-primary" accept="image/jpg, image/png, image/jpeg" id="image[{{ $c->id }}]" name="image[{{ $c->id }}]" >
                    </div>
                </div>               
            @endforeach                        
            </div>            
        <div class="col">
            <div class=" input-group-outline mt-3 shadow p-3 mb-5 bg-light rounded">
                    <label class="form-label text-dark">Tamaño</label>
                    <hr>
                        @foreach($size as $s)
                        <div class="container col py-3 shadow p-3 mb-5 bg-white rounded">
                            <div class="form-check">
                            <input class="form-check-input col shirtsize" type='checkbox'  value="{{ $s->id }}"  name='shirtsize_id[{{$s->id}}]'>
                            <label class="form-label col-6"> {{ $s->size }}</label>
                        </div>
                            <div class="input-group input-group-outline mt-3" id="stocksize[{{ $s->id }}]" style="display:none">
                                <label class="form-label">Cantidad</label>
                                <input class="form-control" type="number" class="form-control"  name="stocksize[{{ $s->id }}]" maxlength="11" id="active[{{$s->id}}]">
                            </div>
                            </div>  
                        @endforeach                        
                </div>  
            </div>
        </div>
        <div class="row">
                <div class="col">
                <div class=" input-group-outline mt-3 shadow p-3 mb-5 bg-light rounded">
                    <label class="form-label text-dark">Tipo</label>
                    <hr>
                        @foreach($type as $t)
                        <div class="container col py-3 shadow p-3 mb-5 bg-white rounded">
                            <div class="form-check">
                            <input type='checkbox' class="form-check-input col" value="{{ $t->id }}"  name='shirttype_id[]'>
                            <label class="form-label col-6"> {{ $t->type }}</label>
                            </div>
                        </div>  
                    @endforeach                        
                </div> 
            </div>        
            <div class="col">
                <div class=" input-group-outline mt-3 shadow p-3 mb-5 bg-light rounded">
                    <label class="form-label text-dark">Impresión</label>
                    <hr>
                        @foreach($print as $p )
                        <div class="container col py-3 shadow p-3 mb-5 bg-white rounded">
                            <div class="form-check">                       
                            <input type='checkbox' class="form-check-input col" value="{{ $p->id }}"  name='typeprint_id[{{ $p->id }}]'>
                            <label class="form-label col-6"> {{ $p->print }}</label>
                            </div>                   
                        </div>  
                    @endforeach                        
                </div> 
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class=" input-group-outline mt-3 shadow p-3 mb-5 bg-light rounded">
                    <label class="form-label text-dark">Descuento</label>
                    <hr>
                        @foreach($descount as $d )
                        <div class="container ">
                        <div class="form-check row shadow p-3 mb-5 bg-white rounded">
                            <input type='checkbox' class="form-check-input col" value="{{ $d->id }}"  name='descountsetting_id[{{ $d->id }}]'>
                            <label class="form-label col-6"> {{ $d->descount }} - {{ $d->description }}</label>
                        </div>
                    </div>
                        @endforeach                        
                </div>
            </div>
            <div class="col">
                <div class=" input-group-outline mt-3 shadow p-3 mb-5 bg-light rounded">
                    <label class="form-label text-dark">Categoria</label>
                    <hr>
                        @foreach($category as $c)                        
                            <div class="form-check shadow p-3 mb-5 bg-white rounded">
                            <input type='checkbox' class="form-check-input col" value="{{ $c->id }}"  name='category_id[]'> 
                            <label class="form-label col-6"> {{ $c->name }}</label>   
                        </div>
                    @endforeach                        
                </div>   
            </div>
        </div>   
    </div>                                
    </div>
    </div>
    </form>
    </div>
    <script>
        var color=document.querySelectorAll('.shirtcolor');
        color.forEach(function(element, i) {
            element.addEventListener('change', function(){
                if(element.checked){
                    document.getElementById("image["+(i+1)+"]").style.display="block";                    
                }else{
                    document.getElementById("image["+(i+1)+"]").style.display="none";                    
                }
            });
        });


        var size=document.querySelectorAll('.shirtsize');
        size.forEach(function(element2, s) {
            element2.addEventListener('change', function(){
                if(element2.checked){
                    document.getElementById("stocksize["+(s+1)+"]").style.display="flex";  
                    document.getElementById("active["+(s+1)+"]").required=true;                  
                }else{
                    document.getElementById("stocksize["+(s+1)+"]").style.display="none";
                    document.getElementById("active["+(s+1)+"]").required=false;                   
                }
            });
        });
    </script>
    <x-plugins></x-plugins>
</x-layout>