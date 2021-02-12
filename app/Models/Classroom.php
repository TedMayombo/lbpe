<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','school_id',];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }
}
