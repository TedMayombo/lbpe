<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body'];
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function frequency()
    {
        return $this->belongsTo(Frequency::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }
}
