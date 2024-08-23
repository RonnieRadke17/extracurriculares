<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;
    protected $table = 'event_types';
    protected $fillable = ['name'];
    public $timestamps = false;
    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
