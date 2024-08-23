@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 shadow-md rounded-lg">
        <h2 class="text-center text-2xl font-extrabold text-gray-900 mb-6">¿Olvidó su contraseña?</h2>
        
        @if (session('message'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->has('message'))
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                {{ $errors->first('message') }}
            </div>
        @endif

        <form action="{{ route('password.send-password-code') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" placeholder="Ingrese su correo" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200">
                Enviar Código
            </button>
        </form>
    </div>
</div>
@endsection
