<form action="{{route('extracurricular.update', $extracurricular->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('extracurricular.form',['modo'=>'Editar'])
</form>