Mostrar todas las roles
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('role.create')}}" class="btn btn-primary">Crear role</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>
                <a href="{{route('role.edit', $role->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('role.destroy', $role->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>