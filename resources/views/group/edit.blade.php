<form action="{{route('group.update', $group->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('group.form',['modo'=>'Editar'])
</form>