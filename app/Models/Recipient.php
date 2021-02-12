<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;
    protected $fillable = ['recipient_id','message_id','classroom_id','school_id','pas_id','is_read',];
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
