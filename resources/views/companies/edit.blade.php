@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">{{ __('Update the Company\'s profile') }}</div>
                        <div class="float-right">
                            <a href="{{ route('company.index', ['id' => $company->id]) }}" class="btn btn-primary">Back to the company</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.update', ['id' => $company->id]) }}">

                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $company->name}}" autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Company contact') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $company->email}}" autocomplete="email" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Company address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $company->address }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" >{{$company->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="numberOfEmployees" class="col-md-4 col-form-label text-md-right">{{ __('Number of Employees') }}</label>

                                <div class="col-md-6">
                                    <input id="numberOfEmployees" type="number" class="form-control" name="numberOfEmployees" value="{{ $company->number_of_employees }}" >
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script type="text/javascript">
        console.log('tsetset')

    </script>
@endsection