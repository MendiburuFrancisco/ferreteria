 
<form action="{{url('producto/'.$producto->codigo)}}" method="GET" enctype="multipart/form-data" >
    @csrf
    @include('producto.form',['modo'=>'mostrar'])
</form>
 