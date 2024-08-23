<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //consultamos la informacion de la DB
        $data['categories'] = Category::all(); 

        return view('category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ], [
            'name.required' => 'El name es requerido',
            'name.string' => 'El name debe ser texto',
            'name.max' => 'El name no debe ser mayor a 100 caracteres',
        ]);
    
        $data = $request->except('_token');
        Category::insert($data);
        // Si la validación es exitosa, redireccionar a una página
        return redirect('category')->with('mensaje', 'Registro agregado exitosamente.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('category.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function validarname(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:100',
         ], [
             'name.required' => 'El name es requerido',
             'name.string' => 'El name debe ser texto',
             'name.max' => 'El name no debe ser mayor a 100 caracteres',
             'name.unique' => 'El name ya está en uso',
         ]);
     }
     
     public function update(Request $request, $id)
     {
         $this->validarname($request);
     
         $categories = Category::findOrFail($id);    
         $data = $request->except('_token', '_method');
         Category::where('id', $id)->update($data);
     
         return redirect('category')->with('mensaje', 'Registro modificado.');
     }
     
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Category::destroy($id);
        return redirect('category')->with('mensaje','Registro eliminado.');
    }
}
