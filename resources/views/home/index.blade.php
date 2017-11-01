@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row'>
        <div class='col-md-4 col-md-offset-4'>
            @foreach($products as $product)
               	<img src="{{$product->pictures()->first()->link()}}" width="150" height="150">
            @endforeach
        </div>
    </div>
</div>
@endsection
