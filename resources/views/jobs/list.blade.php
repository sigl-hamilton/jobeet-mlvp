@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('List of Jobs') }}</div>
                    <div class="card-body">
                        @foreach($jobs as $job)
                        <div class="card mt-5">
                            <h5 class="card-header">{{ $job->name }}</h5>
                            <div class="card-body">
                                <h5 class="card-title">Recruiter: {{$job->recruiter->name}}</h5>
                                <p class="card-text">{{ $job->description }}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
