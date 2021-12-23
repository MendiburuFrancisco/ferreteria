@if ( !(Session::get('nombre') !== null && Session::get('nombre') == 'admin'))
                    
 
    <section class="py-3">
      <form action="{{url('carrito/agregar')}}" method="POST" enctype="multipart/form-data"> 
        @csrf 
      <div class="container px-4 px-lg-5 my-5 shadow p-3 mb-5 bg-body rounded">
        <a href="{{url('tienda')}}">Volver </a>
          <div class="row gx-4 gx-lg-5 align-items-center">
              <div class="col-md-6">
                @if(isset($producto->imagen))
                
                <img class="card-img-top mb-5 mb-md-0" src="{{asset('storage').'/'.$producto->imagen  }}" alt="..." />
              @endif   
              <!-- <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /> -->
           
              </div>
              <div class="col-md-6">
                      <!-- NOMBRE DEL PRODUCTO   -->
            
                      <h1 class="display-9 fw-bolder">
                        {{isset($producto->nombre)? $producto->nombre : '' }}
                      </h1>
                      <div>
                <!-- MARCA DEL PRODUCTO -->
                  <div class="small mb-1"> {{isset($producto->marca)?$producto->marca:''}}  <br>
                
              
                      <label>Categoria: {{isset($producto->categoria)?$producto->categoria : '' }}</label>
                  
                  </div>
                  <div class="fs-5 mb-1">
                      <!-- PRECIO ACTUAL DEL PRODUCTO -->
                      <span>
                          <h3>${{isset($producto->precio)?$producto->precio : '' }}</h3> 
                      </span>
                  </div>
            
                  <p class="lead">
                  
                      <textarea name="descripcion" id="descripcion" cols="59" rows="10" >{{isset($producto->descripcion)?$producto->descripcion : '' }}</textarea>
                      
                  </p>
                  <div class="d-flex justify-content-between ">
            
                      <input class="form-control text-center me-3" name="cantidadProducto"   id="cantidadProducto" type="num" value="1" style="max-width: 3rem" />
                      <input class="invisible" name="codigoDelProducto" id="codigoDelProducto" value="{{$producto -> codigo}}">
                      @if (Session::get('id') != null)
                        <button class="btn btn-primary flex-shrink-0" type="submit">
                          <i class="bi-cart-fill me-1"></i>
                          Agregar al carrito
                        </button>
                      @else
                        
                        <button class="btn btn-primary flex-shrink-0"  data-toggle="modal" data-target="#modal_container" id="open">
                          <i class="bi-cart-fill me-1"></i>
                          Agregar al carrito
                        </button> 
                        @include('usuario.modal.create')
                      @endif
                   
                  </div>
              </div>
          </div>
      </div>
    </form>
    </section>

 @else
<!-- Product section-->

<form action="{{url('producto/guardarCambios/'.$producto->codigo)}}" method="POST" enctype="multipart/form-data" >
  @csrf
    {{@method_field('PATCH')}}
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
      <a href="{{url('tienda')}}">Volver </a>
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
              @if(isset($producto->imagen))
              
              <img class="card-img-top mb-5 mb-md-0" src="{{asset('storage').'/'.$producto->imagen  }}" alt="..." />
             @endif   
             <!-- <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /> -->
                {{isset($producto->imagen)? $producto->imagen : '' }}
                <input type="file"  value="" name="imagen" id="imagen">
            </div>
            <div class="col-md-6">
                    <!-- NOMBRE DEL PRODUCTO   -->
                    <label> Nombre </label>
                    <h1 class="display-5 fw-bolder">
                         <input type="text"  value="{{isset($producto->nombre)? $producto->nombre : '' }}" name="nombre" id="nombre">  
                    </h1>
                    <div>
              <!-- MARCA DEL PRODUCTO -->
                <div class="small mb-1"><label>Marca</label> <br>
                <input type="text"  value="{{isset($producto->marca)?$producto->marca:''}}" name="marca" id="marca"> </div>
            
                    <label>Categoria</label>
                    <input type="text" value="{{isset($producto->categoria)?$producto->categoria : '' }}"  name="categoria" id="categoria"> 
                </div>
                <div class="fs-5 mb-1">
                    <!-- PRECIO ACTUAL DEL PRODUCTO -->
                    <span>
                        <label>Precio $</label><input type="double"  value="{{isset($producto->precio)?$producto->precio : '' }}" name="precio" id="precio">
                    </span>
                </div>
           
                <p class="lead">
                    <label>descripcion</label> <br>
                    <textarea name="descripcion" id="descripcion" cols="59" rows="10" >{{isset($producto->descripcion)?$producto->descripcion : '' }}</textarea>
                    <input type="text"  value="{{isset($producto->descripcion)?$producto->descripcion : '' }}" name="descripcion" id="descripcion">
                </p>
                <div class="d-flex">
                  <label>Stock</label> 
                    <input class="form-control text-center me-3" name="stock"   id="stock" type="num" value="{{isset($producto->stock)?$producto->stock : '' }}" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                      <i class="bi bi-pencil"></i>
                        GUARDAR CAMBIOS
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
 @endif

