<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    public function olders(){
        return $this->hasMany(Prayer::class);
    }
    public function prayer_detail(){
        return $this->hasMany(Prayer_detail::class);
    }

    public function GetPersonAttribute(){
        return $this->category == "Share This Anonymously" ? "Anonymous" : $this->name;
    }
    public function getNumPrayerAttribute(){
        return count($this->prayer_detail);
    }
}
