@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('List of Companies') }}</div>
                    <div class="card-body">
                        @foreach($companies as $company)
                        <div class="card mt-4">
                            <h5 class="card-header">{{ $company->name }}</h5>
                            <div class="card-body">
                                <h5 class="card-title">Contact: {{$company->email}}</h5>
                                <p class="card-text">{{ $company->description }}</p>
                                <a href="{{ route('company.index', ['id' => $company->id]) }}" class="btn btn-primary">See more</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
