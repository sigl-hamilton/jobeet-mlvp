<?php

namespace App\Http\Controllers;

use App\Job;
use App\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class JobController extends Controller
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
     * Show list of users
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        // TODO Only if admin
        $jobs = Job::with('recruiter')->get();

        return view('jobs.list', ['jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('jobs.index', ['job' => Job::where(['id' => $id])->with('recruiter')->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['job'] = Job::where(['id' => $id])->with('recruiter')->first();
        $data['labels'] = Label::all();

        return view('jobs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'labels' => 'required|array',
        ]);


        $job = Job::where('id',$id)->first();

        $job->labels()->sync($request->labels);
        $jobUpdate = [
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'job_type' => $request->job_type
        ];

        $job->update($jobUpdate);


        $data['labels'] = Label::all();
        $data['job'] = $job;
        return view('jobs.edit', $data)
            ->with('success','Great! Product updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->user_type === 'candidate')
            return redirect()->route('job.list');


        $data['labels'] = Label::all();
        $data['recruiter'] = $user;

        return view('jobs.edit', $data);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'duration' => 'required'|'in:permanent,temporary,contract,internship',
            'job_type' => 'required'|'in:l6m,m6m,p',
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request, $recruiter_id)
    {

        $this->validator($request->all())->validate();

        return Job::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'duration' => $request['duration'],
            'job_type' => $request['name'],
            'recruiter_id' => $recruiter_id,
        ])
            ? redirect()->route('job.list')
            : redirect()->route('job.create');
    }
}
