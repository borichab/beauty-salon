<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parlours extends Model
{
    protected $fillable = [
      'name', 'image', 'owner_f_name', 'owner_l_name', 'address', 'gender', 'city', 'location_url', 'about_parlour', 'mobile', 'user_id', 'availability',
    ];

    public function image(){
        return $this->hasMany('App\SliderImage');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function service(){
        return $this->hasMany('App\Services');
    }
    
    public function product(){
        return $this->hasMany('App\Products');
    }
    
    public function appointment(){
        return $this->hasMany('App\Appointments');
    }
}
