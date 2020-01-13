<?php

namespace App\Http\Controllers;

use App\Job;
use App\Label;
use App\User;
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

        $user = Auth::user();

        $labelIds = $user->labels->pluck('id');

        for($i = 0; $i < count($jobs); ++$i) {
            $jobLabelIds = $jobs[$i]->labels->pluck('id');
            $labelLength = count($jobLabelIds);
            if($labelLength && $user->user_type == 'candidate') {
                $match = (count($labelIds->intersect($jobLabelIds)) / $labelLength) * 100 ;
            } elseif($user->user_type == 'candidate') {
                $match = 100;
            } else {
                    $match = -1;
            }
            $jobs[$i]->match = $match;
        }

        return view('jobs.list', ['jobs' => $jobs->sortByDesc('match'), 'user_labelIds' => $labelIds]);
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

        return view('jobs.create', $data);
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
            'job_type' => 'required|in:permanent,temporary,contract,internship',
            'duration' => 'required|in:l6m,m6m,p',
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

        $recruiter = User::where(['id' => $recruiter_id])->first();

        $job = Job::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'duration' => $request['duration'],
            'job_type' => $request['job_type'],
            'recruiter_id' => $recruiter->id,
            'company_id' => $recruiter->company_id,
        ]);

        $job->labels()->sync($request['labels']);

        return $job
            ? redirect()->route('job.list')
            : redirect()->route('job.create');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $job_id)
    {
        $job = Job::where(['id' => $job_id])->first();

        $job->labels()->detach();

        $job->delete();

        return redirect()->route('job.list');
    }
}
