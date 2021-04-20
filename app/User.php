<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstNameAttribute()
    {
        return ucfirst(strtolower($this->name));
    }

      /**
         * Get the user's first name.
         *
         * @param  string  $value
         * @return string
         */
      public function getFirstLetterAttribute()
      {
        return substr($this->name,0,1);
    }


    public function eventCreated()
    {
        return $this->hasMany('App\Event');
    }

    public function getGravatarAttribute()
     {
        $default='https://livepanel.livedesign.org/assets_admin/media/users/default.jpg';
        $size=80;
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?d=$default&s=$size";
    }

}
