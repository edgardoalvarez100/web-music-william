<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{	

	 use SoftDeletes;
	 
      public function status()
    {
    	return $this->belongsTo('App\Status');
    }


}
