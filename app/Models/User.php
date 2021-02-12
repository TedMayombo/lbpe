<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function generateToken()
    {   
        $randStr = Str::random(32);
        $this->api_token = hash('sha256', $randStr);
        $this->save();
        return $this->api_token;
    }
    public function roles(){ return $this->belongsToMany(Role::class);}
    public function schools(){ return $this->belongsToMany(School::class);}
    public function classrooms(){ return $this->belongsToMany(Classroom::class);}
    public function pas(){ return $this->belongsToMany(Pas::class); }
    public function messages(){ return $this->hasMany(Message::class);}
    public function subjects(){ return $this->belongsToMany(Subject::class);}
    public function subscriptions(){ return $this->belongsToMany(Subscription::class);}
}
