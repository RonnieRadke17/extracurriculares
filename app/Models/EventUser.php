<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model//esta es la de asistencia de evento
{
    use HasFactory;
    protected $table = 'event_user';
    protected $fillable = ['event_id', 'user_id', 'attendance'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
