<form action="{{route('role.update', $role->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('role.form',['modo'=>'Editar'])
</form>