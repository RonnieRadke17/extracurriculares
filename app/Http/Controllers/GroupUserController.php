<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//show all groups for students
    {                
        //falta mostrar los grupos agrupados por extracurricular


        $activeGroups = Group::where('status', 'A')->get();//prevenir solo mostrar grupos activos A 
        //grupos inscritos por el usuario registered groups
        $user = auth()->user();
        $registeredGroups = $user->groups()->where('status', 'A')->get();

        return view('group-user.index',compact('activeGroups','registeredGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verificar si el usuario está autenticado
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para registrarte en un grupo.');
    }

    $userId = auth()->id();

    // Adjuntar el usuario actual al grupo especificado en la tabla intermedia user_group
    $user = User::find($userId);
    $user->groups()->attach($request->group_id);

    return redirect()->back()->with('success', 'Te has registrado exitosamente en el grupo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //elimina el registro del grupo de un user
        $user = auth()->user();
        $user->groups()->detach($id);

        return redirect()->route('group-user.index')->with('success', '¡Inscripción cancelada exitosamente!');
    }
}
