@extends('layouts.app')
@section('content')

	<div class="container">
		@include('layouts.sessions-flash')
		<h1 style=" margin-left: 14%;">Products</h1>
		@if (count($products)) <!-- Check it there any product to show. -->
			@include('products.list_products')
			@section('scripts')
				<script src="{{asset('js/deleteConfirm.js')}}"></script>
			@endsection
		@else
			@include('products.no_products')
		@endif
	</div>
@endsection
