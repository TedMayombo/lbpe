<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = ['name',];
    public function schools()
    {
        return $this->belongsToMany(School::class);
    }
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
