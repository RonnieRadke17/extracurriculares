creacion de periods

<form action="{{ url('period') }}" method="POST">
    @csrf
   @include('period.form',['modo'=>'Registrar'])
</form>