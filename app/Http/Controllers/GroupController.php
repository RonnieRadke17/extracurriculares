<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\GroupName;
use App\Models\Period;
use App\Models\Extracurricular;
use App\Models\User;// talves ni lo ocupo por ahora
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /*
    falta poner un lista de maestros para que pueda seleccionar quien lo da o el mismo lo da poner esa validacion de si es
    admin o es profe
    */

    /**
     * Display a listing of the resource.
     */
    public function index()//lleva 3 relaciones con extracurricular con nombre group y periodo
    {
        $data['groups'] = Group::all();
        return view('group.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()//revisar que el diseno esta raro
    {
        //sencillo manda los ddList como si fueras a mostrar todos los valores
        $group = new group(); // Crear un nuevo objeto group
        $group_name = GroupName::pluck('name','id');
        $extracurricular = Extracurricular::pluck('name','id');
        $periods = Period::all(); // Obtener todos los periodos

        $period_options = []; // Array para almacenar las opciones del select

        foreach ($periods as $period) {//aqui mandamos los valores concatenados para mostrarlos en la vista
            $start_end = $period->start . ' - ' . $period->end; // Combinar los valores de inicio y fin
            $period_options[$period->id] = $start_end; // Asignar la combinación a la clave del id
        }
        return view('group.create',compact('group','group_name','extracurricular','period_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data = [
            'group_name_id' => $request->group_name_id,
            'extracurricular_id' => $request->extracurricular_id,
            'period_id' => $request->period_id,
            'user_id' => Auth::id(),
            'status' => "A",
        ];
        

        Group::insert($data);
        return redirect('group')->with('mensaje', 'Registro agregado exitosamente.');
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
        $group =Group::findOrFail($id);
        $group_name = GroupName::pluck('name','id');
        $extracurricular = Extracurricular::pluck('name','id');
        $periods = Period::all(); // Obtener todos los periodos

        $period_options = []; // Array para almacenar las opciones del select

        foreach ($periods as $period) {//aqui mandamos los valores concatenados para mostrarlos en la vista
            $start_end = $period->start . ' - ' . $period->end; // Combinar los valores de inicio y fin
            $period_options[$period->id] = $start_end; // Asignar la combinación a la clave del id
        }
        return view('group.edit',compact('group','group_name','extracurricular','period_options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)//falta agregar el status
    {
        $data = $request->except('_token', '_method');
        Group::where('id', $id)->update($data);
        return redirect('group')->with('mensaje', 'Registro modificado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)//ya
    {
        //
        Group::destroy($id);
        return redirect('group')->with('mensaje','Registro eliminado.');
    }
}
