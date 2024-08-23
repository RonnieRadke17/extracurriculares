Mostrar todas las carreras
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif
<a href="{{route('major.create')}}" class="btn btn-primary">Crear major</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($majors as $major)
        <tr>
            <td>{{$major->id}}</td>
            <td>{{$major->name}}</td>
            <td>
                <a href="{{route('major.edit', $major->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('major.destroy', $major->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>