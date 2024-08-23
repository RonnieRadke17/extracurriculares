<form action="{{route('group_name.update', $group_name->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('group_name.form',['modo'=>'Editar'])
</form>