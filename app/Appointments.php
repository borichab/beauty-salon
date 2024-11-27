<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'user_id', 'msg', 'date_time', 'status', 'payment_status', 'parlour_id', 'service_id',
    ];
    
    public function service(){
        return $this->belongsTo(Services::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parlour()
    {
        return $this->belongsTo(parlours::class);
    }

}
