<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'paternal',
        'maternal',
        'birthdate',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    

    //faltan 2 relaciones una con eventos y grupos y pasar todo a ingles
    //lo metodos se llaman como la tabla y el nombre::class es el nombre de el modelo

    //falta checar el usuario_roles por el valor que es
    public function roles()
    {
        //return $this->belongsToMany(role::class, 'Usuario_roles', 'users_id', 'roles_id');
        return $this->belongsToMany(Role::class);
    }

    public function roleDetail()
    {
        //return $this->hasMany(RoleDetail::class, 'users_id');
        return $this->hasMany(RoleDetail::class);
    }

    //relacion de muchos a muchos es decir un usuario tiene muchos registros de eventos
    //un evento tiene muchos registros de usuarios users->event_user<-events
    public function events()//asistencias es userEvent events
    {
        return $this->belongsToMany(Event::class);
    }

    //relacion de muchos a muchos es decir un usuario tiene muchos registros de grupos
    //un grupo tiene muchos registros de usuarios users->group_user<-group

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    
    /*
    public function userGroup(){
        return $this->hasMany(UserGroup::class, 'users_id');
        return $this->hasMany(UserGroup::class);
    }*/


    //relacion con grupos
    public function group()//carga es usergroup
    {
        //return $this->hasMany(group::class, 'users_id');
        return $this->hasMany(Group::class);
    }

    //relacion con eventos
    public function event()//asistencias es userEvent
    {
        return $this->hasMany(Event::class);
    }

}
