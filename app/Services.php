<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'name', 'category', 'image', 'duration', 'price', 'description', 'discount', 'parlour_id',
    ];
    
    public function parlour(){
        return $this->belongsTo('App\parlours');
    }
    
    public function appointment(){
        return $this->hasMany('App\Appoitments');
    }
}
