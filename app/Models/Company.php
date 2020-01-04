<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'email', 'description', 'numberOfEmployee'
    ];

    /**
     *  Get candidates that have this label
     */
    public function recruiters()
    {
        return $this->hasMany('App\User');
    }

    public function getNumberOfEmployee()
    {
        return $this->number_of_employees;
    }
}


