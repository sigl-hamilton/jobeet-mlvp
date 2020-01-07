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

    /**
     *  Get jobs that have this company
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function getNumberOfEmployee()
    {
        return $this->number_of_employees;
    }

    public function addEmployee($company_id)
    {
        $company = Company::where('id',$company_id)->first();
        $company->number_of_employees += 1;
        $company->save();
    }
}


