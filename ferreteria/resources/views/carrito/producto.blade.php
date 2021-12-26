
<div class="container m-3">



@foreach ($arrayProductos as $producto) 
  <div class="card mb-3" style="max-width: 880px;">
    <div class="row g-0">
      <div class="col-md-2">
        <img src="{{asset('storage').'/'.$producto->imagen  }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <h5 class="card-title" style="font-size:16px;">{{$producto ->nombre}}
          </h5>
          <p class="card-text" style="margin:0px;">{{$producto ->marca}}</p>
         
          <div class="row">
            
            <div class="col">
              <div class="row justify-content-start">
                
                <div class="col">
                  <p class="card-text" style="font-size:24px;">{{$producto -> precio}}</p>
                </div>
                <div class="col-1">
                  <p class="card-text" style="font-size:24px;">x</p>
                </div>
                <div class="col-2">
                  <input type="text" name="cantidadProducto" style="width: 36px; height:36px; text-align:center" value="{{$producto -> cantidad}}">
                </div>
                <div class="col-1">
                  <p class="card-text" style="font-size:24px;">=</p>
                </div>
               
                
              </div>
            
            </div>
            <div class="col">
              <p class="text" style="font-size:24px;">${{$producto -> subtotal}}</p>
            </div> 
          </div>
        </div>
      </div>
      <div class="col-2 ">
        <div class="container p-2">
   
        <div class="row">
          <form action="{{url('/carrito/eliminarProducto/'.$producto->codigo)}}" method="post">
            @csrf
            @method('DELETE')
          
          <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Eliminar</button>
          </form>
        </div>
        <div class="row">
          <form action="{{url('/carrito/modificarProducto/'.$producto->codigo.'/'.$producto->cantidad)}}" method="post">
            @csrf
            @method('PATCH')
          <button type="submit" class="btn btn-secondary"> <i class="bi bi-trash"></i>Modificar</button>
        </form>
        </div>
      </div>
      </div>
    </div>
  </div>

@endforeach

</div>