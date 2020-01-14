@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>
                    <div class="card-body">
                        @foreach($user->notifications as $notification)
                            <a class="nav-link" href="{{ route('login') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header">
                                            @if($notification->read)
                                                <span class="badge badge-pill badge-primary">Read</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Unread</span>
                                            @endif
                                            New applier
                                        </div>
                                        <h5>Job : {{ $notification->job->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
