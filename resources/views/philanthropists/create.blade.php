@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create new philanthropist
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <form method="POST" action="{{ route('philanthropists.store') }}">
                                @csrf

                                <div class="form-group row required">
                                    <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row required">
                                    <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row required">
                                    <label for="email" class="col-md-4 col-form-label text-md-right required">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row required">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right required">{{ __('Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="offset-md-4 col-md-2">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Create') }}
                                        </button>
                                    </div>

                                    <div class="col-md-2">
                                        <button type="reset" class="btn btn-danger">
                                            {{ __('Reset') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
