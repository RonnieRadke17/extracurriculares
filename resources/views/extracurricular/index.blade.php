Mostrar todas las extracurriculars
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('extracurricular.create')}}" class="btn btn-primary">Crear extracurricular</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($extracurriculars as $extracurricular)
        <tr>
            <td>{{$extracurricular->id}}</td>
            <td>{{$extracurricular->name}}</td>
            <td>{{$extracurricular->category->name}}</td>
            <td>
                <a href="{{route('extracurricular.edit', $extracurricular->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('extracurricular.destroy', $extracurricular->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>