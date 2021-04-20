<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
	protected $fillable=  ['text','link','target'];
	
	public function event()
	{
		return $this->belongsTo('App\Event');
	}
}
