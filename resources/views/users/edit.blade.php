@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->name}}</div>
                    <div class="card-body">
                        <ul class="navbar-nav mr-auto">
                            <li><a class="nav-link" href="{{ route('user.edit', ['id' => Auth::user()->id]) }}">Personnal information</a></li>
                            <li><a class="nav-link" href="{{ route('label.list') }}">My jobs</a></li>
                            <li><a class="nav-link" href="{{ route('user.list') }}">My Company</a></li>
                            <li><a class="nav-link" href="{{ route('job.list') }}"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update your Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', ['id' => Auth::user()->id]) }}">

                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" required autocomplete="name" autofocus disabled>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User\'s Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="user_type" name="user_type">
                                        <option value="candidate" {{ Auth::user()->user_type  === 'candidate'? 'selected':'' }}>Candidate</option>
                                        <option value="recruiter" {{ Auth::user()->user_type === 'recruiter'? 'selected':'' }}>Recruiter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="labels">{{ __('Skills') }}</label>
                                <div class="col-md-6">
                                    <select multiple="multiple"  class="form-control"  id="labels" name="labels[]">
                                        @foreach($labels as $label)
                                            <option value="{{ $label->id }}" {{ ($user_info->labels->pluck('id')->contains($label->id)) ? 'selected':'' }}>{{ $label->name }}</option>
                                        @endforeach
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