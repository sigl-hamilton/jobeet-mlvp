@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List of labels') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($labels as $label)
                                <li class="list-group-item">{{ $label->name }}</li>
                            @endforeach
                        </ul>
                        <div class="col-md-6 mt-2">
                            <a class="btn btn-primary" href="{{ route('label-create-form') }}" role="button">{{ __('Add a new Label') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
