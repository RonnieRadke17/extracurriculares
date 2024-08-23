<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model//carrera
{
    use HasFactory;
    protected $table = 'majors';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function roledetail()
    {
        return $this->hasMany(roledetail::class);
    }
}
