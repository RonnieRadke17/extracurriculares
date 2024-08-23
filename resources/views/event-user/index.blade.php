@extends('layouts.app')
@section('title','Home')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('js/prueba.js') }}"></script> 
@endsection

@section('content')
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
            <th>tipo de evento</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
<!--falta aqui poner tarjetas con todos los datos-->
        @foreach ($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->name}}</td>
            <td>{{$event->extracurricular->name}}</td>
            <td>{{$event->eventType->name}}</td>
            <td>
                <form action="{{ route('event-user.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-primary">Inscribir</button>
                </form>
                
                <form action="{{ route('event-user.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{route('profile')}}">Perfil</a>
<a href="{{route('logout')}}">Salir</a>    



@endsection



