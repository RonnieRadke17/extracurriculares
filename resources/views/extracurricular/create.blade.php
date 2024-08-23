creacion de extracurriculares

<form action="{{ url('extracurricular') }}" method="POST">
    @csrf
   @include('extracurricular.form',['modo'=>'Registrar'])
</form>