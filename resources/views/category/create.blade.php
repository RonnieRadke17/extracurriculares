creacion de categorys

<form action="{{ url('category') }}" method="POST">
    @csrf
   @include('category.form',['modo'=>'Registrar'])
</form>