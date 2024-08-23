creacion de carreras

<form action="{{ url('group') }}" method="POST">
    @csrf
   @include('group.form',['modo'=>'Registrar'])
</form>