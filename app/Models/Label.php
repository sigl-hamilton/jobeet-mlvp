<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     *  Get candidates that has this label
     */
    public function users()
    {
        return $this->belongsToMany('App/User', 'users_labels');
    }
}
