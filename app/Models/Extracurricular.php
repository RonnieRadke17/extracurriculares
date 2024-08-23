<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;
    protected $table = 'extracurriculars';
    protected $fillable = ['name', 'category_id'];
    public $timestamps = false;

    //Relacion uno a muchos
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }
}
