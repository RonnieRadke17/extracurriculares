@if (Session::has('error'))
{{Session::get('error')}}    
@endif

@if (Session::has('success'))
{{Session::get('success')}}    
@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Extracurricular</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activeGroups as $group)
        <tr>
            <td>{{$group->id}}</td>
            <td>{{$group->groupName->name}}</td>
            <td>{{$group->extracurricular->name}}</td>
            <td>
                @if ($registeredGroups->contains($group))
                    <form action="{{ route('group-user.destroy', $group->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
                @else
                    <form action="{{ route('group-user.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                        <button type="submit" class="btn btn-primary">Inscribir</button>
                    </form>
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>