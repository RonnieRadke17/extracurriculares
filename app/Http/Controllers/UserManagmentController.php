<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar usuarios aplicando filtros de los 4 roles clasificandolos para modificarlos pero 
        //mostrando solo un tipo de user a la vez

        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        $externals = User::whereHas('roles', function ($query) {
            $query->where('name', 'externals');
        })->get();

        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->get();

        $teacher = User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->get();



        return view('user-managment.index',compact('admins','externals','students','teacher'));
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
