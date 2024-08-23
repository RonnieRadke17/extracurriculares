<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Extracurricular;
use App\Models\EventType;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar todos los eventos que hay(activos),tener otra ventana para los eventos que no estan activos
        //falta poner un status en el evento como A/NA o incluso terminado
        $data['events'] = Event::all();
        return view('event.index',$data);

        //mostrar solo los nombres y asi luego usar el show para mostrar los detalles con una alerta
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $extracurriculars = Extracurricular::pluck('name','id');
        $eventTypes = EventType::pluck('name','id');
        $places = Place::pluck('name','id');
        return view('event.create',compact('extracurriculars','eventTypes','places'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //agregar descripcion del evento y solamente dejar capacidad, quitar registrados y poner un status
        //'name', 'date', 'time', 'ability', 'registered', 'place_id', 'extracurricular_id', 'event_type_id', 'user_id'
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'ability'=> $request->ability,
            
            'place_id' => $request->place_id,
            'extracurricular_id' => $request->extracurricular_id,
            'event_type_id' => $request->event_type_id,
            //'status' => $request->status, poner el campo en la vista
            'user_id' => Auth::user()->id
        ];

        Event::insert($data);
        
        // Si la validación es exitosa, redireccionar a una página
        return redirect('event')->with('mensaje', 'Registro agregado exitosamente.');
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
