<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'amount', 'user_id', 'appointment_id',
    ];
    
    public function user(){
        return $this->morphTO();
    }
    
    public function appointment(){
        return $this->morphTO();
    }
}
