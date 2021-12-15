

<nav class="navbar navbar-expand-lg navbar-dark sticky-lg-top " aria-label="Third navbar example" style="background-color:#6279c8;">
 
    <div class="container-fluid col-md-10">
      <a class="navbar-brand" href="#">
        <img src="laravel\ferreteria\icon\ferreteria.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Ferretería</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" >  </span>
      </button>
       
     
      <div class="collapse navbar-collapse" id="navbarsExample03">
        

    
        
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <form class="col-md-10" action="{{url('tienda/filtrar')}}" method="GET">
            <input class="form-control" name="textoBuscador" type="text" placeholder="Buscar productos, marcas, categorias..." aria-label="Search">
          </form>
       

        
          <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('tienda')}}">Tienda</a>
          </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <!-- ACA DEBERÍAN GENERARSE POR DEFECTO TODAS LAS CATEGORIAS DISPONIBLES-->

              <li><a class="dropdown-item" href="#">Baño</a></li>
              <li><a class="dropdown-item" href="#">Carpintería</a></li>
              <li><a class="dropdown-item" href="#">Construcción</a></li>
              <!-- CON UN FOR DEBERÍA PODERSE-->
            </ul>
          </li>
      

        </ul>
       
        <ul class="navbar-nav me-0 mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Cuenta</a>
          </li>
         
          <li class="nav-item" style="background-color: rgba(134, 129, 129, 0.15); ">
           <div class="navbar-nav me-0 mb-2 mb-sm-0">
           
           <!-- <img src="laravel\ferreteria\icon\carrito.png" alt="" width="24" height="24" class="d-inline-block align-text-top">
           -->
           <i class="bi bi-cart-fill"></i>
           <a class="nav-link active" aria-current="page" href="#">Carrito</a>
          </div>
           
          </li>
        </ul>
      
      </div>
    </div>
  </nav>