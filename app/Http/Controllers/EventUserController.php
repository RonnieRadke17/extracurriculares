<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Extracurricular;
use App\Models\EventType;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar solo eventos activos y agregar 
        //roles que no ven boton de inscripcion o cancelacion(Admin y Profesor)
        //roles que ven boton de inscripcion o cancelacion(Alumno y Externo)
        //se deben mostrar eventos de paga para externo y evento(interno/externo) para alumno
        //los eventos deben mostrarse en una tarjeta y cuando se le de click ventana emergente la cual muestre los detalles
        $data['events'] = Event::all();
        return view('event-user.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $userId = auth()->id();
        // Adjuntar el usuario actual al grupo especificado en la tabla intermedia user_group
        $user = User::find($userId);
        $user->events()->attach($request->event_id);
        return redirect()->back()->with('success', 'Te has registrado exitosamente en el grupo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
