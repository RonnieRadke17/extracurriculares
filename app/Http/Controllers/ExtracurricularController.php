<?php

namespace App\Http\Controllers;
use App\Models\Extracurricular;
use App\Models\Category;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//ya esta falta hacer todo lo demas 
    {
        $data['extracurriculars'] = Extracurricular::all();
        //esta linea permite que se muestre el texto de la category en la vista
        $extracurriculars = Extracurricular::with('category')->get();
        return view('extracurricular.index',compact('data','extracurriculars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('extracurricular.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//ya funciona y guarda el id de la category que es
    {
        $data = $request->except('_token');
        Extracurricular::insert($data);
        // Si la validación es exitosa, redireccionar a una página
        return redirect('extracurricular')->with('mensaje', 'Registro agregado exitosamente.');
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
    public function edit($id)//ya esta
    {
        //tambien podemos acceder a la category poniendo esto en la view     <span>{{ $extracurricular->category_id }}</span>
        //hacemos una consulta a category y mandamos todas la categories y su id
        $categories = Category::pluck('name','id');
        //hacemos la consulta a extracurricular y mandamos  todos los datos con el id especifico
        $extracurricular = Extracurricular::findOrFail($id);
        return view('extracurricular.edit',compact('extracurricular','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $extracurricular = Extracurricular::findOrFail($id);
        $data = $request->except('_token', '_method');
        Extracurricular::where('id', $id)->update($data);
        return redirect('extracurricular')->with('mensaje', 'Registro modificado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)//ya funciona
    {
        Extracurricular::destroy($id);
        return redirect('extracurricular')->with('mensaje','Registro eliminado.');
    }
}
