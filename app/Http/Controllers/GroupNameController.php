<?php

namespace App\Http\Controllers;
use App\Models\GroupName;
use Illuminate\Http\Request;

class GroupNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['group_names'] = GroupName::all();
        return view('group_name.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('group_name.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        GroupName::insert($data);
        // Si la validación es exitosa, redireccionar a una página
        return redirect('group_name')->with('mensaje', 'Registro agregado exitosamente.');
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
        $group_name = GroupName::findOrFail($id);
        return view('group_name.edit',compact('group_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $group_name = GroupName::findOrFail($id);
        $data = $request->except('_token', '_method');
        GroupName::where('id', $id)->update($data);
     
         return redirect('group_name')->with('mensaje', 'Registro modificado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        GroupName::destroy($id);
        return redirect('group_name')->with('mensaje','Registro eliminado.');
    }
}
