<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function scopeUnApproved($query)
    {
    	return $query->whereHas('status',function($query){
                    $query->where('id',1);
                });
    }

    public function scopeApproved($query)
    {
        return $query->whereHas('status',function($query){
                    $query->where('id',2);
                });
    }

    public function scopeNoApproved($query)
    {
        return $query->whereHas('status',function($query){
                    $query->where('id',3);
                });
    }

     public function getRouteKeyName()
    {
        return 'id';
    }

    public function status()
    {
    	return $this->belongsTo('App\Status');
    }
}
