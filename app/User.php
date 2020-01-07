<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'labels'
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
     * Get the user's label
     *
     */
    public function labels()
    {
        return $this->belongsToMany('App\Label', 'users_labels');
    }

    public static function recruiters()
    {
        return User::where('user_type', 'recruiter')
            ->with('company')
            ->get();
    }

    public function recruiterJobs()
    {
        return $this->hasMany('App/Job');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }
/*
    public function update()
    {
        return $this->hasMany('App/Job');
    }*/
}
