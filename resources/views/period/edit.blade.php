<form action="{{route('period.update', $period->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('period.form',['modo'=>'Editar'])
</form>