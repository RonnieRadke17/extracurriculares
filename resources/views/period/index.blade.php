Mostrar todas las periods
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}    
@endif

<a href="{{route('period.create')}}" class="btn btn-primary">Crear period</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periods as $period)
        <tr>
            <td>{{$period->id}}</td>
            <td>{{$period->start}}</td>
            <td>{{$period->end}}</td>
            <td>
                <a href="{{route('period.edit', $period->id)}}" class="btn btn-warning">Editar</a> 
                |
                <form action="{{route('period.destroy', $period->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>