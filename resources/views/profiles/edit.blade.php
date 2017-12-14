@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row main main-create">
        <div class="main-login main-center">
            <h1>
                Update profile
                <span class="badge badge-primary">{{Auth::user()->name}}</span>
            </h1>
            <form method="post" action="/profile">
                {{ csrf_field() }}
                {{ method_field('put') }}
                {{-- NAME --}}
                <input type="hidden" value="hack" name="hack">
                <div class="form-group">
                    <input type="text" class="form-control"
                    name="name"
                    value="{{Auth::user()->name}}"
                    placeholder="name"
                    required="required">
                </div>
                {{-- END NAME --}}

                {{-- EMAIL --}}
                <div class="form-group">
                    <input type="email" class="form-control"
                    name="email"
                    value="{{Auth::user()->email}}"
                    placeholder="me@exemple.com"
                    required="required">
                </div>
                {{-- END EMAIL --}}

                {{-- CITY --}}
                <div class="form-group">
                    <input type="text" class="form-control"
                    name="city"
                    value="{{Auth::user()->city}}"
                    placeholder="your city"
                    required="required">
                </div>
                {{-- END CITY --}}

                {{-- ADDRESS --}}
                <div class="form-group">
                    <input type="text" class="form-control"
                    name="address"
                    value="{{Auth::user()->address}}"
                    placeholder="your address"
                    required="required">
                </div>
                {{-- END ADDRESS --}}

                {{-- NPA --}}
                <div class="form-group">
                    <input type="text" class="form-control"
                    name="npa"
                    value="{{Auth::user()->npa}}"
                    placeholder="your npa"
                    required="required">
                </div>
                {{-- END NPA --}}

                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>

</div>
@endsection
