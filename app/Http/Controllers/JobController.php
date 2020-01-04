<?php

namespace App\Http\Controllers;

use App\Job;
use App\Label;
use Illuminate\Http\Request;

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
}
