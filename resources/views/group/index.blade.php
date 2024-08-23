Mostrar todas las groups
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('group.create')}}" class="btn btn-primary">Crear group</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Extracurricular</th>
            <th>Periodo</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($groups as $group)
        <tr>
            <td>{{$group->id}}</td>
            <td>{{$group->groupName->name}}</td>
            <td>{{$group->extracurricular->name}}</td>
            <td>{{$group->period->start}} - {{$group->period->end}}</td>
            <td>{{$group->status}}</td>
            <td>
                <a href="{{route('group.edit', $group->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('group.destroy', $group->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>