


<section class="container">
     <h2>Todos los productos</h2>
     <br>
     <br>
    <div class="row">
        <!-- FILTROS --> 
        <div class="col-3">
            
            <h4>Categorias</h3>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      nombre categoria 1
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      nombre categoria 2
                    </label>
                  </div>


            <h4>Precio</h3>
            <input type="text" name="precioMin" id="precioMin" placeholder="mínimo" style="width: 90px"> 
            <input type="text" name="precioMax" id="precioMax" placeholder="máximo" style="width: 90px" >
            <button class="row">Aplicar filtros</button>
        </div>
        <!-- /FILTROS --> 




        <!-- Productos --> 
        <div class="col-9">
            @include('producto.index',$arrayProductos)
        </div>
    </div>
</section>