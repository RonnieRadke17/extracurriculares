<form action="{{route('permiso.update', $permiso->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('permiso.form',['modo'=>'Editar'])
</form>