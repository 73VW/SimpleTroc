@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Update profile <span class="badge badge-primary">{{Auth::user()->name}}</span>
            	</div>
            	<div class="card-body">
                	Formulaire
            	</div>
            </div>
        </div>
    </div>

</div>
@endsection

