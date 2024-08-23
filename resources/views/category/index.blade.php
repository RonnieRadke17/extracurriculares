Mostrar todas las categories
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('category.create')}}" class="btn btn-primary">Crear Categoría</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
                <a href="{{route('category.edit', $category->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('category.destroy', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>