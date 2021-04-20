<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasSlug;
	use SoftDeletes;

    protected $dates = ['date'];

	public function serie()
	{
		return $this->belongsTo('App\Serie');
	}

	public function speaker()
	{
		return $this->belongsTo('App\Speaker');
	}

	public function promopack()
	{
		return $this->belongsTo('App\Promopack');
	}

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('title')
        ->doNotGenerateSlugsOnUpdate()
        ->saveSlugsTo('slug');
    }
}
