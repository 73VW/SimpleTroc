@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Home
                    <a href="{{action('ProfilesController@edit')}}" class="btn btn-default ">Update my profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
