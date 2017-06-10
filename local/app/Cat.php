<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = 'cats';
    protected $guarded = [];
    public $timestamps = false;

    function product(){
    	return $this->hasMany('App\Product','cat_id');
    }
}
