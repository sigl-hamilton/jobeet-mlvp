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
        'name', 'description', 'job_type', 'duration', 'recruiter_id', 'company_id'
    ];

    public function getDurationAttribute($value)
    {
        switch ($value) {
            case 'l6m':
                return 'Less than 6 months';
            case 'm6m':
                return 'More than 6 months';
            case 'p':
                return 'Permanent';
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

    /**
     *  Get candidates that has this label
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the job's users that applied
     *
     */
    public function candidates()
    {
        return $this->belongsToMany('App\User', 'jobs_users');
    }
}
