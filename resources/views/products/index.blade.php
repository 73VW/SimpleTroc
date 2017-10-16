@extends('layouts.app')
@section('content')

	<div class="container">
		@include('layouts.sessions-flash')
		<h1>Products</h1>
		<form action="/profile/products/1" method="post">

			{{ csrf_field() }}
			{{ method_field('delete') }}

		</form>
		{{dd($products)}}
	</div>
@endsection
