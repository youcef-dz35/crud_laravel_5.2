<?php

namespace App;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
    {
      return $this->belongsTo('App\Role');
    }
    public function photo()
    {
      return $this->belongsTo('App\Photo');
      // code...
    }
    public function setPasswordAttribute($password){
      if(!empty($password)){
        $this->attributes['password'] = \Hash::make($password);
      }
    }
    public function isAdmin()
    {
      if($this->role->name =="Administrator" && $this->is_active ==1){
        return true;
      }
      return false;
    }
    public function posts(){
      return $this->hasMany('App\Post');
    }
}
