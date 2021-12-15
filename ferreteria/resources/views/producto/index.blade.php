 
<section class="">
        <!-- py-5 --> 
    <div class="container">
            <!-- px-4 px-lg-5 mt-5 -->
        <div class="row justify-content-left row-cols-2 row-cols-md-3 row-cols-xl-2">
                <!--  gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 --> 

            @foreach ($arrayProductos as $producto) 
            <div class="col mb-3"  style="height: 375px; width:270px; ">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." style="height: 178px" >
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 style="font-size:18px">
                                <a href="{{url('producto/'.$producto->codigo)}}">{{$producto->nombre}}</a></h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                           
                            </div>
                            <!-- Product price-->
                           ${{$producto->precio}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        
                        <div class="text-center">
                            <input type="text" name="cantidadProducto" placeholder="1" style="width: 42px; height:36px; text-align:center">
                            <a class="btn btn-primary mt-auto"  href="{{url('producto/edit/'.$producto->codigo)}}">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

</div>
    </div>
</section>


 
 
       
 
 
