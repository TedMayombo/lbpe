<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pas extends Model
{
    use HasFactory;
    protected $fillable = ['school_id',];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
