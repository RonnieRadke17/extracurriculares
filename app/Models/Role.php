<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //revisar las relaciones porque debe de estar con rolPermiso UsuarioRoles Detalles rol?
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['name'];
    public $timestamps = false;

    //checar las que estan es espanol
    public function users()
    {
        //return $this->belongsToMany(User::class, 'Usuario_roles', 'roles_id', 'users_id');
        return $this->belongsToMany(User::class);
    }

    public function permission()
    {
        //revisar la relacion
        //return $this->belongsToMany(Permission::class, 'Rol_Permiso', 'roles_id', 'Permisos_id');
        return $this->belongsToMany(Permission::class);
    }
}
