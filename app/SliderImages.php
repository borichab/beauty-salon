<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImages extends Model
{
    protected $fillable = [
        'title', 'msg', 'status', 'service_id',
    ];
    
    public function parlour(){
        return $this->morphTo();
    }
    
    public function service(){
        return $this->morphTo();
    }
}
