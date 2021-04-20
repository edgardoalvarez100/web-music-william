<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tag extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    use HasSlug;


    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    }

    /**
     * Get the options for generating the slug.
     */
	public function getSlugOptions() : SlugOptions
	{
		return SlugOptions::create()
		->generateSlugsFrom('name')
		->doNotGenerateSlugsOnUpdate()
		->saveSlugsTo('slug');
	}

}
