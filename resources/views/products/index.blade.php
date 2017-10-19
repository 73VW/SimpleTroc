@extends('layouts.app')
@section('content')

	<div class="container">
		@include('layouts.sessions-flash')
		<h1>Products</h1>
		@include('products.show_products')
	</div>
@endsection
