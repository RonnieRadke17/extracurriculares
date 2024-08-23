<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['name'];
    public $timestamps = false;
    public function role()
    {
        //revisar esta relacion
        //return $this->belongsToMany(Role::class, 'Rol_Permiso', 'Permisos_id', 'Role_id');
        return $this->belongsToMany(Role::class);
    }
}
