<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     *  Get candidates that has this label
     */
    public function labels()
    {
        return $this->hasMany('App\Label');
    }

    /**
     *  Get candidates that has this label
     */
    public function recruiter()
    {
        return $this->belongsTo('App\User');
    }

}
