
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Inicio</title>

   <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbars/">  
  <!-- SCRIPT PARA PODER OCUPAR LAS FUNCIONALIDADES DEL NAV-->
  <!-- <script src="bootstrap-5.1.3-examples\assets\dist\js\bootstrap.bundle.min.js""></script> -->
  <link href="../resources/css/cuenta.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>  
      <style>
        a{
        text-decoration: none !important;
       }

      i{
        font-size:18px;
      }
        .container-1 {
        padding-top: 8rem;
        padding-bottom: 6rem;
        }
    
        i:focus, i:hover{
            color:#fc5f5f;
            text-decoration: none;
        }
        #op{
          margin-right: 0px;
        }
    
        ul{
          list-style-type: none;
        }
    
       
    
        @media (max-width: 768px) {
          .container-1 {
            position:relative;
            }
          }
          .col-sm-3{
            margin: auto auto auto;
          }
    
          #inicio, #pedidos, #detalles, #finalizar{
            background-color: aliceblue;
            font-family: 'Poppins', sans-serif;
            font-style:normal;
            display: block;
            border: solid #d4d3d3 0.5px;
            padding: 10px 0 10px;
            margin: 5px auto;
          }
          
          .col-sm-8{
            display: inline-block;
            overflow: hidden;
            padding-top:15px;
          }
    
          .col-sm-8 label{
            font-weight:bold ;
            display: block;
            font-size:17px;
          }
    
          .col-sm-8 form .required {
            color: red;
            border: 0;
          }
    
    </style>
    

  <link href="navbar.css" rel="stylesheet">
</head> 
<html>

@include('nav-footer.nav')





    <div class="container-1 row" id="op">
         <!-- Inicio pedidos direcciones detalles de cuenta finalizar sesion-->
        @include('usuario.menu')

          <div class="col-sm-8">
            <form action= " " method="POST" >
              <div class='row'>
                <div class='col-sm-5 form-group'>
                  <label> Nombre <span class='required' aria-hidden="true">*</span></label>
                  <input class="form-control" type= "text" value='{{ Session::get('nombre') }}' 
                  readonly onmousedown="return false;" />
                </div>

                <div class= 'col-sm-5 form-group'> 
                  <label> Apellido <span class="required">*</span></label>
                  <input  type= "text" class="form-control"  value= '{{ Session::get('apellido') }}'
                   readonly onmousedown="return false;" />
                </div>
              </div>

              <div class='row'>
                <div class= 'col-sm-5 form-group'> 
                  <label> Usuario <span class="required">*</span></label>
                  <input  class="form-control" type= "text" value= '{{ Session::get('usuario') }}'
                   readonly onmousedown="return false;" />
                </div>

                <div class= 'col-sm-5 form-group'> 
                  <label> Email <span class="required">*</span></label>
                  <input class="form-control" type= "text" value= '{{ Session::get('email') }}'
                   readonly onmousedown="return false;" />
                </div>
              </div>
            </form>
          </div>   
    </div>
    </html>