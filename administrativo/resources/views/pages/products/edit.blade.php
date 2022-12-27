<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="products"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">        
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Actualizar Camisa"></x-navbars.navs.auth>
        <!-- End Navbar -->

    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Actualizar Camisa</h6>
            </div>
        </div>
        <form action="{{ url('editar-producto/'. $product['id'] ) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row px-5 py-3">
                <div class="col-4">
                <input type="submit" value="Actualizar" class="btn btn-primary justify-content-end">
            </div>
            </div>
            <div class="card-body px-5 pb-2 col-12 row">
                <div class="container col">
                <div class="input-group input-group-outline mt-3 focused is-focused">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" maxlength="50"  value="{{ $product['name'] }}" required>
                </div>
            </div>
            <div class="container col">
                <div class="input-group input-group-outline mt-3 focused is-focused">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="description" maxlength="200" value="{{ $product['description'] }}" required>
                </div>
            </div>
        </div>
        <div class="card-body px-5 pb-2 col-12 row">
            <div class="container col">
                <div class="input-group input-group-outline mt-3 focused is-focused">
                    <label class="form-label">Precio</label>
                    <input type="number" class="form-control" name="price" maxlength="11"  value="{{ $product['price'] }}" required>
                </div>
            </div>
            <div class="container col">
                <div class="container col-4 py-3 shadow p-3 mb-5 bg-white rounded">
                    <div class="form-check">
                        <label class="text-dark">Disponible</label>
                        <input type="checkbox" name="state" class="form-check-input"  value="{{ $product['state'] }}" @checked(old('Habilitar', $product['state']))>
                    </div>
                    </div>
                </div>
                <div class="container col">
                <div class="input-group input-group-outline mt-3 focused is-focused">
                    <label class="form-label">Garantia</label>
                    <input type="number" class="form-control" name="garanty" maxlength="11" value="{{ $product['garanty'] }}">
                </div>
                </div>
                <br>
            </div>
            <div class="container col">
                <hr>
            <div class="card-body px-3 pb-2 row">
                <label class="form-label text-primary">Clasificaciones Seleccionadas - (Desvincular)</label>
                <div class="form-check col">
                    <label for="" class="form-label text-dark">Colores</label>
                    @foreach($product->colors as $product_color)
                    <div class="row">
                        <label for="" class="form-label col-12" style="color: {{ $product_color->color}}">
                            <input type="checkbox" class="form-check-input" name="delete_color[{{ $product_color->id }}]" value="{{ $product_color->id }}">
                            &nbsp; {{ $product_color->name }}
                        </label>
                </div>
                        @endforeach
                </div>
                <div class="form-check col">
                    <label for="" class="form-label text-dark">Tamaños</label>
                    @foreach($product->sizes as $product_size)
                    <div class="row">
                        <label for="" class="form-label col-12">
                            <input type="checkbox" class="form-check-input" name="delete_size[{{ $product_size->id }}]" value="{{ $product_size->id }}">
                            &nbsp; {{ $product_size->size }} &nbsp;  - &nbsp; {{ $product_size->product_size->stock }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="form-check col">
                    <label for="" class="form-label">Tipos</label>
                    @foreach($product->types as $product_type)
                    <div class="row">
                        <label for="" class="form-label col-12">
                            <input type="checkbox" class="form-check-input" name="delete_type[{{ $product_type->id }}]" value="{{ $product_type->id }}">
                            &nbsp; {{ $product_type->type }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="form-check col">
                    <label for="" class="form-label">Categorias</label>
                    @foreach($product->categories as $product_category)
                    <div class="row">
                        <label for="" class="form-label col-12">
                            <input type="checkbox" class="form-check-input" name="delete_category[{{ $product_category->id }}]" value="{{ $product_category->id }}">
                            &nbsp; {{ $product_category->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="form-check col">
                    <label for="" class="form-label">Descuentos</label>
                    @foreach($product->descounts as $product_descount)
                    <div class="row">
                        <label for="" class="form-label col-12">
                            <input type="checkbox" class="form-check-input" name="delete_descount[{{ $product_descount->id }}]" value="{{ $product_descount->id }}">
                            &nbsp; {{ $product_descount->descount }} &nbsp; - &nbsp; {{ $product_descount->description }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="card-body px-5 pb-2 row">
                <label for="" class="form-label text-primary">Agregar o editar una clasificación</label>                
                    <div class="row">
                    <div class=" input-group-outline mt-3 col shadow p-3 mb-5 bg-light rounded">
                        <label class="form-label text-dark">Color</label>
                        <hr>
                    @foreach($color as $col => $c)
                    <div class="container col py-3 shadow p-3 mb-5 bg-white rounded">
                        <div class="form-check">
                            <input class="form-check-input shirtcolor" value="{{ $c->id }}"  type="checkbox" name="shirtcolor_id[{{ $c->id }}]" >
                            <label for='{{ $c->id }}' class="form-label" style='color: {{ $c->color }}'> {{ $c->name }}</label>                            
                        </div>
                        <div class=" input-group-outline mt-3 " style="display: none" id="image[{{ $c->id }}]">
                            <input type="file" class="btn btn-primary" accept="image/jpg, image/png, image/jpeg" style="width: 80%"  name="image[{{ $c->id }}]" >
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
                                <input type='checkbox' class="form-check-input col shirtsize" value="{{ $s->id }}" name='shirtsize_id[{{$s->id}}]'>
                                <label class="form-label col-6"> {{ $s->size }}</label>
                            </div>
                                <div class="input-group input-group-outline mt-3" id="stocksize[{{ $s->id }}]" style="display: none">
                                    <label class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" name="stocksize[{{ $s->id }}]" maxlength="11" id="active[{{ $s->id }}]">
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