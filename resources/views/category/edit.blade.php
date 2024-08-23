<form action="{{route('category.update', $category->id)}}" method="POST">
    @csrf
    @method('PATCH')
   @include('category.form',['modo'=>'Editar'])
</form>