<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    function cat(){
    	return $this->belongsTo('App\Cat','cat_id');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','id_sp');
    }
}
