@extends('layouts.app')
@section('content')
    <script src="{{ asset('js/profile.js') }}"></script>
    {{-- poner un lapiz aqui arriba
    agregar avatars para elegir una foto --}}
    <button onclick="enable" id="editProfile">Editar</button>
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" placeholder="{{Auth::user()->name}}" disabled>
        <br>
        <label for="paternal">Apellido paterno</label>
        <input type="text" name="paternal" id="paternal" placeholder="{{Auth::user()->paternal}}" disabled>
        <br>
        <label for="maternal">Apellido materno</label>
        <input type="text" name="maternal" id="maternal" placeholder="{{Auth::user()->maternal}}" disabled>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="{{Auth::user()->email}}" disabled>
        <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="********" disabled>
        <br>
        <button type="submit" style="display: none;" id="btnsaveProfile">Guardar</button>
        <button type="button" style="display: none;" id="btncancelProfile">Cancelar</button>
        aqui botones de aceptar y cancelar
        //falta poner aqui la carrera y la matricula en dado caso de que sea usr alumno
    </form>
    <details>
        <summary>Borrar cuenta</summary>
        <a href="{{ route('profile.destroy') }}" method="GET">Borrar cuenta</a>
    </details>

@endSection
