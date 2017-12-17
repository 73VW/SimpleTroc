@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row main main-register">
        <div class="main-login main-center">
            <h5>Register</h5>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-8 control-label">Name</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input id="name" type="text" class="form-control" name="name" @if(!empty($name)) value="{{$name}}" @else value="{{ old('name') }}" @endif required placeholder="Enter your Name">

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- EMAIL --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-8 control-label">E-Mail Addres</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input id="email" type="email" class="form-control" name="email" @if(!empty($mail)) value="{{$mail}}" @else value="{{ old('mail') }}" @endif required placeholder="Enter your E-Mail">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- END EMAIL --}}

                {{-- faire une liste déroulante des pays --}}
                {{-- CITY --}}
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    <label for="city" class="col-sm-8 control-label">City</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow fa" aria-hidden="true"></i></span>
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required placeholder="Enter your City">

                            @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- END CITY --}}

                {{-- trouver un moyen de vérifié que l'adresse existe ? --}}
                {{-- ADDRESS --}}
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-sm-8 control-label">Address</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow fa" aria-hidden="true"></i></span>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required placeholder="Enter your Address">

                            @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- END ADDRESS --}}

                {{-- ADDRESS --}}
                <div class="form-group{{ $errors->has('npa') ? ' has-error' : '' }}">
                    <label for="npa" class="col-sm-8 control-label">NPA</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow fa" aria-hidden="true"></i></span>
                            <input id="npa" type="number" class="form-control" name="npa" value="{{ old('npa') }}" required placeholder="Enter your NPA" />

                            @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- END ADDRESS --}}

                {{-- PASSWORD --}}
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-8 control-label">Password</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Enter your Password" />

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- END PASSWORD --}}

                {{-- CONFIRM PASS --}}
                <div class="form-group">
                    <label for="password-confirm" class="col-sm-8 control-label">Confirm Password</label>

                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm your Password" />
                        </div>
                    </div>
                </div>
                {{-- END CONFIRM PASS --}}

                {{-- SUBMIT --}}
                <div class="form-group ">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <h5 class="col-sm-14 control-label">Register With
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
                {{-- END SUBMIT --}}

            </form>
        </div>
        <
    </div>
</div> {{-- CONTAINER --}}
@endsection
