@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left"><h5>Company: {{ $company->name }}</h5></div>
                        <div class="float-right">
                            <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-4 mr-2">
                            <div class="card">
                                <h5 class="card-header">Company's information</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Contact: <a href="mailto:{{$company->email}}">{{$company->email}}</a></h5>
                                    <h5 class="card-title">Address: {{$company->address}}</h5>
                                    <h5 class="card-title">Number of employee: {{$company->number_of_employees}}</h5>
                                    <p>{{$company->description}}</p>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <h5 class="card-header">Recruiter's info</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Recruiters</h5>
                                    <ul>
                                        @if (count($recruiters) != 0)
                                            @foreach($recruiters as $recruiter)
                                                <li><a href="{{ route('user.index', $recruiter->id) }}">{{ $recruiter->name }}</a></li>
                                            @endforeach
                                        @else
                                            There is no recruiters in this company.
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card ">
                                <h5 class="card-header">Job list</h5>
                                <div class="card-body">
                                    @if (count($company->jobs) != 0)
                                        @foreach($company->jobs as $job)
                                            <li><a href="{{ route('job.index', $job->id) }}">{{ $job->name }}</a></li>
                                        @endforeach
                                    @else
                                        There is no jobs available in this company.
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
