<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = ['name','type',];
   
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
