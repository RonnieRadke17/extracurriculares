<?php

namespace App\Http\Controllers;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['event_types'] = EventType::all();
        return view('event_type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        EventType::insert($data);
        // Si la validación es exitosa, redireccionar a una página
        return redirect('event_type')->with('mensaje', 'Registro agregado exitosamente.');
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
        $event_type =EventType::findOrFail($id);
        return view('event_type.edit',compact('event_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event_type = EventType::findOrFail($id);
        $data = $request->except('_token', '_method');
        EventType::where('id', $id)->update($data);
        return redirect('event_type')->with('mensaje', 'Registro modificado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EventType::destroy($id);
        return redirect('event_type')->with('mensaje','Registro eliminado.');
    }
}
