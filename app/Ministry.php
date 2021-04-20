<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ministry extends Model
{
	use SoftDeletes;

	protected $table = 'ministries';
	protected $fillable=  ['name'];

	public function getitemMinistriesAttribute(){
		$ministries = "";
		foreach ($this->ministries as $item) {
			$q = str_replace(' ', '', $item->name);
			$ministries .= str_replace('|', '', $q) . ' ';
		}
		return strtolower($ministries);
	}
}
