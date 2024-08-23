<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = ['name', 'date', 'time', 'ability', 'place_id', 'extracurricular_id', 'event_type_id', 'status', 'user_id'];

    public function place()//lugar
    {
        return $this->belongsTo(Place::class);
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }


    //relacion de muchos a muchos es decir un usuario tiene muchos registros de eventos
    //un evento tiene muchos registros de usuarios users->event_user<-events
    public function users()//asistencias es userevent
    {
        return $this->belongsToMany(User::class);
    }

    //relacion con users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
