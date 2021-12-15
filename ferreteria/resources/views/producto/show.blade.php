<html>

    @include('nav-footer.nav')

<form action="{{url('producto/'.$producto->codigo)}}" method="GET" enctype="multipart/form-data" >
    @csrf
    @include('producto.form',$producto)
</form>


  
  
@include('nav-footer.footer')
</html>