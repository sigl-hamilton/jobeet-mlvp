<?php

namespace App\Http\Controllers;

use App\Company;
use App\Label;
use App\User;
use App\Job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show list of companies
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $companies = Company::all();

        return view('companies.list', ['companies' => $companies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['company'] = Company::where(['id' => $id])->first();

        $data['recruiters'] = User::where(['company_id' => $id, 'user_type' => 'recruiter'])->get();

        $data['jobs'] = Job::where(['company_id' => $id])->first();

        return view('companies.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['company'] = Company::where(['id' => $id])->first();

        return view('companies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //TODO
        /*$request->validate([
            'labels' => 'required|array',
        ]);*/


        $company = Company::where('id',$id)->first();

//        $company->labels()->sync($request->labels);
        $companyUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'address' => $request->address,
        ];

        $company->update($companyUpdate);
        $company->number_of_employees = $request->numberOfEmployees;
        $company->save();

        //$data['labels'] = Label::all();
        $data['company'] = $company;
        return view('companies.edit', $data)
            ->with('success','Great! Product updated successfully');
    }
}
