<?php

namespace App\Http\Controllers;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['periods'] = Period::all();
        return view('period.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('period.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        Period::insert($data);
        // Si la validación es exitosa, redireccionar a una página
        return redirect('period')->with('mensaje', 'Registro agregado exitosamente.');
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
        $period = Period::findOrFail($id);
        return view('period.edit',compact('period'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $period = Period::findOrFail($id);
        $data = $request->except('_token', '_method');
        Period::where('id', $id)->update($data);
     
         return redirect('period')->with('mensaje', 'Registro modificado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Period::destroy($id);
        return redirect('period')->with('mensaje','Registro eliminado.');
    }
}
