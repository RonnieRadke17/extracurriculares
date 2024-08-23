creacion de event_type

<form action="{{ url('event_type') }}" method="POST">
    @csrf
   @include('event_type.form',['modo'=>'Registrar'])
</form>