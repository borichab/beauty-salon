<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'f_name', 'l_name', 'email', 'mobile', 'dob', 'sex', 'city', 'photo', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function payment(){
        return $this->hasMany('App\Payments');
    }
    
    public function parlour(){
        return $this->hasMany('App\parlours');
    }
    
    public function appointment(){
        return $this->hasMany('App\Appointments');
    }
}
