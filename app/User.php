<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'access_level', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Setting data mutators
    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    //Mutators for setting password
    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }

    //Accessor for date created field
    public function getCreatedAttribute($value){
        return $this->attributes["created_at"]=Carbon::parse($value)->diffForHumans();
    }


    //relation of user to user details
    public function userDetails(){
        return $this->hasOne(UserDetail::class);
    }

    //relation of user to purchase
    public function purchase(){
        return $this->hasMany(Purchase::class);
    }
}
