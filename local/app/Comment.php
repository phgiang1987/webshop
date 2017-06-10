<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = [];
    
    public function customer(){
    	return $this->belongsTo('App\Customer','id_customer');
    }
    public function sanpham(){
    	return $this->belongsTo('App\Product','id_sp');
    }
    
}
