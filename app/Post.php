<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    use HasSlug;
	use SoftDeletes;

	protected $dates = ['published_at'];

	public function scopePublished($query)
	{
		return $query->whereNotNull('published_at')
			->where('published_at', '<=', Carbon::now())
			->latest('published_at');
	}

	// public function getPublishedAtAttribute($valor)
	// {
	// 	return Carbon::parse($valor)->format('d-m-Y');
	// }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
	public function getSlugOptions() : SlugOptions
	{
		return SlugOptions::create()
		->generateSlugsFrom('title')
		->doNotGenerateSlugsOnUpdate()
		->saveSlugsTo('slug');
	}


	public function commets()
    {
    	return $this->hasMany('App\Comments');
    }

    public function images()
    {
    	return $this->hasMany('App\Photo');
    }


    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
