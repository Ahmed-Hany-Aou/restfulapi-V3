<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     const VERIFIED_USER = '1';
     const UNVERIFIED_USER = '0';
 
     const ADMIN_USER = 'true';
     const REGULAR_USER = 'false';
     protected $table='users';
     protected $dates =['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password',
        'verified','verification_token', 'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];
    public function setNameAttribute($name)
    {
        $this ->attributes['name']=strtolower($name);
    }

    public function getNameAttribute($name)
    {
        return ucwords ($name);
    }

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }
    
    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }

    public static function generateVerificationCode()
    {
        return Str::random(40);
    }
}