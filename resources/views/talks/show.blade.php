@extends('layouts.app')

@section('content')
	<div class="ui stackable container grid">
	  <div class="eight wide column">
	  	@include('talks.show-comments')
	  </div>
	  <div class="eight wide column">
		@include('talks.right-side')
	  </div>
	</div>
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/assets/owl.carousel.min.css">
@endsection

@section('scripts')
 <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>

<script>
	axios.post('/comments/hasRead/{{$talk->id}}')
	  .then(function (response) {
	    console.log(response);
	  })
	  .catch(function (error) {
	    console.log(error);
	  });
</script>
@endsection
