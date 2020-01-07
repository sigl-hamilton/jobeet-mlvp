@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">{{ __('Update the mission') }}</div>
                        <div class="float-right">
                            <a href="{{ route('job.list') }}" class="btn btn-primary">Back to the job</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('job.insert', ['id' => $recruiter->id]) }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Job's name" required autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" required placeholder="Job's description..." ></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="labels">{{ __('Skills required') }}</label>
                                <div class="col-md-6">
                                    <select multiple="multiple"  class="form-control"  id="labels" name="labels[]">
                                        @foreach($labels as $label)
                                            <option value="{{ $label->id }}" >{{ $label->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="job_type">{{ __('Job\'s Type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control"  id="job_type" name="job_type">
                                        <option value="permanent">Permanent</option>
                                        <option value="temporary">Temporary</option>
                                        <option value="contract">Contract</option>
                                        <option value="internship">Internship</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="duration">{{ __('Duration') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control"  id="duration" name="duration">
                                        <option value="l6m">Less than 6 months</option>
                                        <option value="m6m">More than 6 months</option>
                                        <option value="p">Permanent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
