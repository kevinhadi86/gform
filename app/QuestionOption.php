<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
	protected $fillable = ['option'];
    public function question(){
    	return $this->belongsTo('App\Question');
    }
}
