creacion de carreras

<form action="{{ url('permiso') }}" method="POST">
    @csrf
   @include('permiso.form',['modo'=>'Registrar'])
</form>