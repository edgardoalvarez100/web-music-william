<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
	use SoftDeletes;
	use HasSlug;

    protected $dates = ['date'];

	public function videos()
	{
		return $this->hasMany('App\Video');
	}

	public function promopack()
	{
		return $this->belongsTo('App\Promopack');
	}

	public static function currentSerie()
	{
		$serie = Serie::orderBy('date', 'DESC')->get()->first();
		return $serie;
	}

	static function current_serie(){
		$serie = Serie::orderBy('date', 'DESC')->get()->first();
		$url = "archive/" . $serie->slug;
		return $url;
	}
	static function current_video(){
		$serie = Serie::orderBy('date', 'DESC')->get()->first();
		$url = "archive/" . $serie->slug . "?video=" . $serie->video[0]->id;
		return $url;
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
