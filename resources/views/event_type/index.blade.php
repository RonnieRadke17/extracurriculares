Mostrar todos los tipos de eventos
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('event_type.create')}}" class="btn btn-primary">Crear event_type</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($event_types as $event_type)
        <tr>
            <td>{{$event_type->id}}</td>
            <td>{{$event_type->name}}</td>
            <td>
                <a href="{{route('event_type.edit', $event_type->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('event_type.destroy', $event_type->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>