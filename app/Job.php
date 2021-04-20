<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use DateTime;
use Carbon\Carbon;

class Job extends Model
{
    use HasSlug;
	use SoftDeletes;
	
	protected $dates = ['publication_enddate','publication_startdate'];
    
    
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


	public function scopePublished($query)
    {
        return $query->whereNotNull('publication_startdate')
            ->where('publication_startdate', '>=', Carbon::now())
            ->where('publication_enddate', '<=', Carbon::now())->latest('publication_startdate');
    }

	public function setPublicationEnddateAttribute($value)
	{
		$this->attributes['publication_enddate'] = Carbon::createFromFormat('Y-m-d H:i', $value);
	}

	public function setPublicationStartdateAttribute($value)
	{
		$this->attributes['publication_startdate'] = Carbon::createFromFormat('Y-m-d H:i', $value);
	}


	public function getPublicationEnddateAttribute($value)
	{
		return Carbon::createFromFormat('Y-m-d H:i', Carbon::parse($value)->format('Y-m-d H:i'));
	}

	public function getPublicationStartdateAttribute($value)
	{

		return Carbon::createFromFormat('Y-m-d H:i', Carbon::parse($value)->format('Y-m-d H:i'));
	}
}
