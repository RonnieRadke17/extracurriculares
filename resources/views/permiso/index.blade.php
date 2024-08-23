Mostrar todas las permisos
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('permiso.create')}}" class="btn btn-primary">Crear permiso</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permisos as $permiso)
        <tr>
            <td>{{$permiso->id}}</td>
            <td>{{$permiso->nombre}}</td>
            <td>
                <a href="{{route('permiso.edit', $permiso->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('permiso.destroy', $permiso->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>