@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left"><h5>Job: {{ $job->name }}</h5></div>
                        <div class="float-right">
                            <a href="{{ route('job.edit', ['id' => $job->id]) }}" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-4 mr-2">
                            <div class="card">
                                <h5 class="card-header">Recruiter info</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Recruiter: {{$job->recruiter->name}}</h5>
                                    <h5 class="card-title">Contact: {{$job->recruiter->email}}</h5>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <h5 class="card-header">Company info</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Recruiter: TODO</h5>
                                    <h5 class="card-title">Contact: TODO</h5>
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
                                    <h5 class="card-title">Skills needed:
                                        @foreach($job->labels as $label)
                                            <span class="badge badge-dark">{{$label->name}}</span>
                                        @endforeach
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
