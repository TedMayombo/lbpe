<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    use HasFactory;
    protected $fillable = ['title','frequency','is_active',];
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
