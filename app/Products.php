<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name', 'company', 'price', 'description', 'discount', 'rating', 'img',
    ];
    
    public function parlour(){
        return $this->morhpTo();
    }
}
