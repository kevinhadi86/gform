<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function questions(){
    	return $this->hasMany('App\Question');
    }
}
