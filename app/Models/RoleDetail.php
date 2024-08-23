<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDetail extends Model
{
    use HasFactory;
    protected $table = 'role_detail';
    protected $fillable = ['user_id', 'role_id', 'tuition', 'major_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
