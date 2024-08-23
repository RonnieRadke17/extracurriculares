<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $table = 'periods';
    protected $fillable = ['start', 'end'];
    public $timestamps = false;
    public function group()
    {
        return $this->hasMany(Group::class);
    }
}
