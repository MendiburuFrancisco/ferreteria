

<form action="producto" method="POST" enctype="multipart/form-data" >
    @csrf
    @include('producto.form',['modo'=>'editar'])
</form>