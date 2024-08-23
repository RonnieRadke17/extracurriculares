<form action="{{route('event_type.update', $event_type->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('event_type.form',['modo'=>'Editar'])
</form>