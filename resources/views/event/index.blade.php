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

<button  id="btnForm">Mostrar Formulario</button>
<input type="button" value="crear">
poner un floating action button con un mas 
<a href="{{route('event.create')}}" class="btn btn-primary">Crear event</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Extracurricular</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->name}}</td>
            <td>{{$event->extracurricular->name}}</td>
            <td>{{$event->eventType->name}}</td>
            <td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{route('profile')}}">Perfil</a>
<a href="{{route('logout')}}">Salir</a>    



@endsection



