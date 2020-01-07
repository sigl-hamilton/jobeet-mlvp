@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">{{ __('List of Jobs') }}</div>
                        @if(Auth::user()->user_type !== 'candidate')
                            <div class="float-right">
                                <a href="{{ route('job.create') }}" class="btn btn-primary">Create</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        @foreach($jobs as $job)
                            <div class="card mt-5">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5>{{ $job->name }}</h5>
                                            @foreach($job->labels as $label)
                                                @if($user_labelIds->contains($label->id))
                                                    <span class="badge badge-pill badge-primary">{{ $label->name }}</span>
                                                @else
                                                    <span class="badge badge-pill badge-secondary">{{ $label->name }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-md-4" >
                                            @if($job->match > 70)
                                                <span class="badge badge-success float-right">{{ round($job->match) }}</span>
                                            @elseif($job->match >= 0)
                                                <span class="badge badge-warning float-right">{{ round($job->match) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Recruiter: {{$job->recruiter->name}}</h5>
                                    <p class="card-text">{{ $job->description }}</p>
                                    <a href="{{ route('job.index', ['id' => $job->id]) }}" class="btn btn-primary">See
                                        more</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
