<form action="{{url('producto/'.$producto->codigo)}}" method="POST" enctype="multipart/form-data" >
    @csrf
    {{@method_field('PATCH')}}
    @include('producto.form',['modo'=>'editar'])
 
</form>