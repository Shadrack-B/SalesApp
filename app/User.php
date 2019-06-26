<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'parent_id', 'user_type_id', 'deleted_at'
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


    public function teams()
    {
        return $this->belongsToMany('App\Team', 'team_members');
    }
    public function sales(){
        // dd($this->id);
        return $this->hasMany('App\Sale', 'user_id');
    }

    public function children(){
        return $this->hasMany('App\User', 'parent_id');
    }

    public function parent(){
        return $this->belongsTo('App\User', 'parent_id');
    }
    
    public function usertype(){
        return $this->belongsTo('App\Usertype', 'user_type_id');
    }

    public function commissions(){
        return $this->hasMany('App\Commission', 'user_id');
    }
}
