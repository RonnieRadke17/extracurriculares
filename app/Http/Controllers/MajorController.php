<?php

namespace App\Http\Controllers;
use App\Models\major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//ya
    {
        $data['majors'] = major::all();
        return view('major.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        major::insert($data);
        // Si la validación es exitosa, redireccionar a una página
        return redirect('major')->with('mensaje', 'Registro agregado exitosamente.');
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
    public function edit($id)
    {
        //
        $major =major::findOrFail($id);
        return view('major.edit',compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $major = major::findOrFail($id);
        $data = $request->except('_token', '_method');
        major::where('id', $id)->update($data);
        return redirect('major')->with('mensaje', 'Registro modificado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        major::destroy($id);
        return redirect('major')->with('mensaje','Registro eliminado.');
    }
}
