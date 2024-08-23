<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
        
class GroupName extends Model
{
    use HasFactory;

    protected $table = 'group_names';
    protected $fillable = ['name'];
    public $timestamps = false;
    
    public function group()
    {
        return $this->hasMany(Group::class);
    }
}
