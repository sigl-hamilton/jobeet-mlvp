@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left"><h5>{{ $user->name }}</h5></div>
                        @if($user->id == Auth::user()->id)
                            <div class="float-right">
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Update</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body row">
                        <div class="col-md-4 mr-2">
                            <div class="card">
                                <h5 class="card-header">Information</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Mail:  <a href="mailto:{{$user->email}}">{{$user->email}}</a></h5>
                                    <h5 class="card-title">Type: {{$user->user_type}}</h5>
                                </div>
                            </div>
                            <div class="card mt-2">
                                @if ($user->user_type == 'recruiter')
                                    <h5 class="card-header">Company info</h5>
                                    <div class="card-body">
                                        @if ($user->company != null)
                                            <h5 class="card-title">Name: <a href="{{ route('company.index', $user->company->id) }}">{{$user->company->name}}</a></h5>
                                            <h5 class="card-title">Contact: <a href="mailto:{{$user->company->email}}">{{$user->company->email}}</a></h5>
                                            <h5 class="card-title">Address: {{$user->company->address}}</h5>
                                        @else
                                            <h5 class="card-title">The recruiter don't have company.</h5>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="card mt-2">
                                <h5 class="card-header">Skills</h5>
                                <div class="card-body">
                                    @if (count($user->labels) != 0)
                                        @foreach($user->labels as $label)
                                            <span class="badge badge-dark">{{$label->name}}</span>
                                        @endforeach
                                    @else
                                        No skills has been entered.
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <h5 class="card-header">Picture</h5>
                                <div class="card-body">
                                    <center>
                                        <img src="/uploads/profile_pictures/{{ $user->picture }}" style="width: 150px; height: 150px">
                                    </center>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <h5 class="card-header">Member info</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Member since: {{ $user->created_at }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
