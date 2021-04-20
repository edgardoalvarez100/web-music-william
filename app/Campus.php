<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Campus extends Model
{
	use SoftDeletes;
    use HasSlug;

	protected $table = 'campus';
	protected $fillable=  ['name','slug'];

	public function events()
	{
		return $this->belongsToMany('App\Event','events_campus');
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
