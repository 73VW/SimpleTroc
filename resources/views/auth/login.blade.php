@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h5>Login</h5>
            <form class="form-horizontal" method="post" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" value="{{ old('email') }}" required/>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-sm-10 col-sm-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-secondary" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </form>
            <div class="form-group">
                <h5 class="col-sm-14 control-label">Login With
                </h5>
                <div class="col-sm-14">
                    <a href="{{ url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
                    <a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                    <a class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                    <a class="btn btn-social-icon btn-bitbucket"><i class="fa fa-bitbucket"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
