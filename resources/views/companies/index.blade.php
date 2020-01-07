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
                                    <h5 class="card-title">Contact: {{$company->email}}</h5>
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
                                        @foreach($recruiters as $recruiter)
                                            <li>{{ $recruiter->name }}</li>
                                        @endforeach
                                    </ul>
                                    <h5 class="card-title">Contact: TODO</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card ">
                                <h5 class="card-header">Job list</h5>
                                <div class="card-body">
                                    TODO : Company's jobs
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
