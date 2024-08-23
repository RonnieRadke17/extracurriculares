creacion de NGrupos

<form action="{{ url('group_name') }}" method="POST">
    @csrf
   @include('group_name.form',['modo'=>'Registrar'])
</form>