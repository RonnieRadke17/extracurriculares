<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name'];
    //usar el timestamps en false para que no se generen los campos created_at y updated_at
    public $timestamps = false;

    public function extracurricular()
    {
        return $this->hasMany(Extracurricular::class);
    }
}
