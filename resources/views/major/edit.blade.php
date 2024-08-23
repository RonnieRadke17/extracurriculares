<form action="{{route('major.update', $major->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('major.form',['modo'=>'Editar'])
</form>