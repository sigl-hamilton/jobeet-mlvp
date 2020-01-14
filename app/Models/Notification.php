<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'read', 'job_id'
    ];

    /**
     *  Get user linked to this notification
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     *  Get job linked to this notification
     */
    public function job()
    {
        return $this->belongsTo('App\Job');
    }

}
