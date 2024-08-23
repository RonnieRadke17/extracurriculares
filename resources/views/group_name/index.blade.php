Mostrar todas los nombres de grupos
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('group_name.create')}}" class="btn btn-primary">Crear nombre grupo</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($group_names as $group_name)
        <tr>
            <td>{{$group_name->id}}</td>
            <td>{{$group_name->name}}</td>
            <td>
                <a href="{{route('group_name.edit', $group_name->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('group_name.destroy', $group_name->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>