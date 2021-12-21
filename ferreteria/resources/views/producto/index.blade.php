<section class="">
    <!-- py-5 -->
    <div class="container">
      <!-- px-4 px-lg-5 mt-5 -->
      <div class="row justify-content-left row-cols-2 row-cols-md-3 row-cols-xl-2">
        <!--  gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 --> 
        @foreach ($arrayProductos as $producto) 
        <div class="col mb-3" style="height: 375px; width:270px; ">
          <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="{{asset('storage').'/'.$producto->imagen  }}" alt="..." style="height: 178px">
            <!-- <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." style="height: 178px" >
                       Product details-->
            <form action="{{url('carrito/agregar')}}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                <div class="card-body">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 style="font-size:18px">
                    <a href="{{url('producto/show/'.$producto->codigo)}}">{{$producto->nombre}}</a>
                  </h5>
                  <!-- Product reviews-->
                  <div class="d-flex justify-content-center small text-warning mb-2"></div>
                  <!-- Product price--> ${{$producto->precio}}
                  <input class="invisible" type="text" name="codigoDelProducto" value="{{$producto->codigo}}" style="width: 0px; height:1px;">
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <input type="text" id="cantidadProducto" name="cantidadProducto" value="1" style="width: 42px; height:36px; text-align:center">
                  <button class="btn btn-primary mt-auto" href="#" type="submit">Agregar al carrito</button>
                </div>
              </div>
            </form>
          </div>
        </div> 
        @endforeach
      </div>
    </div>
  </section>