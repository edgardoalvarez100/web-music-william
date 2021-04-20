<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
	use SoftDeletes;
	use HasSlug;

	public function videos()
	{
		return $this->hasMany('App\Video');
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
