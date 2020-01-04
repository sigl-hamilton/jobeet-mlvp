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
        'name', 'description', 'job_type', 'duration'
    ];

    public function getDurationAttribute($value)
    {
        switch ($value) {
            case 'l6m':
                return 'Less than 6 months';
            case 'm6m':
                return 'More than 6 months';
            case 'p':
                return 'Pemanent';
            default:
                return 'unknown value: ' . $value;
        }
    }

    /**
     *  Get candidates that has this label
     */
    public function labels()
    {
        return $this->belongsToMany('App\Label', 'jobs_labels');
    }

    /**
     *  Get candidates that has this label
     */
    public function recruiter()
    {
        return $this->belongsTo('App\User');
    }

}
