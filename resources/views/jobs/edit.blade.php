@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">{{ __('Update the mission') }}</div>
                        <div class="float-right">
                            <a href="{{ route('job.index', ['id' => $job->id]) }}" class="btn btn-primary">Back to the job</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('job.update', ['id' => $job->id]) }}">

                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $job->name}}" required autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description"  required >{{$job->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="labels">{{ __('Skills required') }}</label>
                                <div class="col-md-6">
                                    <select multiple="multiple"  class="form-control"  id="labels" name="labels[]">
                                        @foreach($labels as $label)
                                            <option value="{{ $label->id }}" {{ ($job->labels->pluck('id')->contains($label->id)) ? 'selected':'' }}>{{ $label->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="job_type">{{ __('Job\'s Type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control"  id="job_type" name="job_type">
                                        <option value="permanent" {{ $job->job_type === 'permanent' ? 'selected':'' }}>Permanent</option>
                                        <option value="temporary" {{ $job->job_type === 'temporary' ? 'selected':'' }}>Temporary</option>
                                        <option value="contract" {{ $job->job_type === 'contract' ? 'selected':'' }}>Contract</option>
                                        <option value="internship" {{ $job->job_type === 'internship' ? 'selected':'' }}>Internship</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="duration">{{ __('Duration') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control"  id="duration" name="duration">
                                        <option value="l6m" {{ $job->duration === 'Less than 6 months' ? 'selected':'' }}>Less than 6 months</option>
                                        <option value="m6m" {{ $job->duration === 'More than 6 months' ? 'selected':'' }}>More than 6 months</option>
                                        <option value="p" {{ $job->duration === 'Permanent' ? 'selected':'' }}>Permanent</option>
                                    </select>
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