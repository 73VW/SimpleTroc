@extends('layouts.app')
@section('content')

	<div class="container">
		@include('layouts.sessions-flash')
		<h1>Products</h1>
		<form action="/profile/products/1" method="post">

			{{ csrf_field() }}
			{{ method_field('delete') }}

		</form>
		@foreach ($products as $product)
			<div class="card mt-4">
			@foreach ($product->pictures as $picture)
				<img class="card-img-top img-fluid" src="{{URL::to('/').'/storage/public/'.$picture->path}}" alt="">
			@endforeach
			<div class="card-body">
			  <h3 class="card-title">{{$product->name}}</h3>
			  <h4>{{$product->price}}</h4>
			  <p class="card-text">{{$product->description}}</p>
			</div>
		  </div>
		@endforeach
	</div>
@endsection
