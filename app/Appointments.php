<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'user_id', 'msg', 'date_time', 'status', 'payment_status', 'parlour_id', 'service_id',
    ];
    
    public function service(){
        return $this->morphTo();
    }
    
    public function parlour(){
        return $this->morphTo();
    }
    
    public function user(){
        return $this->morphTo();
    }
    
    public function payment(){
        return $this->morphTo('App\Payments', 'appointment');
    }
}
