<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\CalendarLinks\Link;
use DateTime;

class Event extends Model
{
	use HasSlug;
	use SoftDeletes;

	public function ministries()
	{
		return $this->belongsToMany('App\Ministry','events_ministries');
	}

	public function creator()
	{
		return $this->belongsTo('App\User','user_created');
	}

	public function campuses()
	{
		return $this->belongsToMany('App\Campus','events_campus');
	}

	public function location()
	{
		return $this->belongsTo('App\Location');
	}

	public function buttons()
	{
		return $this->hasMany('App\Button');
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

    // Full location for API CALENDAR
    public function getFullLocationAttribute(){
        return $this->location_name ." ". $this->location_street ." ". $this->location_state ." ". $this->location_zip ." ". $this->location_line1 ." ". $this->location_line2;
    }

    // Generate a link calendar for gmail, ics, ourlook...
    // for mor information please verify de API
    public function getCaldataAttribute(){
        $from = DateTime::createFromFormat('Y-m-d H:i', Carbon::parse($this->start_datetime)->format('Y-m-d H:i'));
        $to = DateTime::createFromFormat('Y-m-d H:i', Carbon::parse($this->end_datetime)->format('Y-m-d H:i'));

        $link = \Spatie\CalendarLinks\Link::create($this->name, $from, $to)->description($this->description)->address($this->FullLocation);
        return $link;
    }


	//Metodo para eventos
	public function getitemMinistriesAttribute(){
		$ministries = "";
		foreach ($this->ministries as $item) {
			$q = str_replace(' ', '', $item->name);
			$ministries .= str_replace('|', '', $q) . ' ';
		}
		return strtolower($ministries);
	}

	static function getListMinistry($campus_events){
		$global_array = [];
		foreach ($campus_events as $event_min) {
			foreach ($event_min->ministries as $liMinistry) {
	    		if (!in_array($liMinistry->name, $global_array)) {
	    			$global_array[] = $liMinistry->name;
	    		}
			}
		}
		$li = '';
		foreach ($global_array as $data) {
			$q = str_replace(' ', '', $data);
			$ministry = str_replace('|', '', $q);
			$li .= '<li class="" data-filter=".'.strtolower($ministry).'"><span>'.$data.'</span></li>';
		}
		return $li;
	}

}
