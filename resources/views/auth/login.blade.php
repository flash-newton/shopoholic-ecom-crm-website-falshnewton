@extends('layouts.app')

@section('content')
<div class="container mycard">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" regheader card-header">Login Form</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../slider/loginpic.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                          
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check col-12 ">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link forget" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    </div>
                                </div>

                                <div class="mb-0 btnbox">
                                    <button type="submit" class="btn regbtn">
                                        {{ __('Login') }}
                                    </button>
   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('mycss')
    <link rel="stylesheet" href="../css/login.css">
@endsection