creacion de roles

<form action="{{ url('role') }}" method="POST">
    @csrf
   @include('role.form',['modo'=>'Registrar'])
</form>