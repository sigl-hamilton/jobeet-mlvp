@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left"><h5>Job: {{ $job->name }}</h5></div>
                        <div class="float-right row">
                            @if (Auth::user()->user_type !== "candidate")
                                <a href="{{ route('job.edit', ['id' => $job->id]) }}" class="btn btn-primary">Update</a>
                                <form action="{{ route('job.delete', ['id' => $job->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @else
                                <form action="{{ route('job.apply', ['job_id' => $job->id, 'user_id' => Auth::user()->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-4 mr-2">
                            <div class="card">
                                <h5 class="card-header">Recruiter info</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Recruiter: <a href="{{ route('user.index', $job->recruiter->id) }}">{{$job->recruiter->name}}</a></h5>
                                    <h5 class="card-title">Contact: <a href="mailto:{{$job->recruiter->email}}">{{$job->recruiter->email}}</a></h5>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <h5 class="card-header">Company info</h5>
                                <div class="card-body">
                                    @if ($job->company != null)
                                        <h5 class="card-title">Name: <a href="{{ route('company.index', $job->company->id) }}">{{$job->company->name}}</a></h5>
                                        <h5 class="card-title">Contact: <a href="mailto:{{$job->company->email}}">{{$job->company->email}}</a></h5>
                                        <h5 class="card-title">Address: {{$job->company->address}}</h5>
                                    @else
                                        <h5 class="card-title">The job was not posted by a company.</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card ">
                                <h5 class="card-header">Job info</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Job Type: {{ ucfirst ($job->job_type) }}</h5>
                                    <h5 class="card-title">Duration: {{ $job->duration }}</h5>
                                    <p class="card-text">{{ $job->description }}</p>
                                    <h5 class="card-title">Skills needed:</h5>
                                        @if (count($job->labels) != 0)
                                            @foreach($job->labels as $label)
                                                <h5><span class="badge badge-dark">{{$label->name}}</span></h5>
                                            @endforeach
                                        @else
                                            This job don't need any skill.
                                        @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
