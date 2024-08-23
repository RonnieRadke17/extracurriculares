<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = ['group_name_id', 'period_id', 'extracurricular_id', "user_id", 'status'];
    public $timestamps = false;
    
    public function groupName()
    {
        return $this->belongsTo(GroupName::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }

    //checar la relaion con user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //relacion de muchos a muchos es decir un usuario tiene muchos registros de grupos
    //un grupo tiene muchos registros de usuarios users->group_user<-group
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /*
    public function userGroup()//cargas es userGroups
    {
        return $this->hasMany(UserGroup::class);
    }*/

}
