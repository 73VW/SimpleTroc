@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{$talk->title}}</h1>
		<div class="ui comments">
			  <div class="ui segment">
			  		@foreach ($comments as $comment)
			  		  <div class="comment">
					    <div class="content">
					    	@if ($comment->isCurrentUser())
					    	<div class="ui horizontal label">
					    		<a class="author">it's you</a>
					    	</div>

					    	@else
									<a class="author"><strong>{{$comment->getUserName()}}</strong></a>
					    	@endif

					      <div class="metadata">
					        <div class="date">{{$comment->created_at}}</div>
					      </div>
					      <div class="text">
					        <p>{{$comment->body}}</p>
					      </div>
					      <div class="actions">
					        <a class="reply">Reply</a>
					      </div>
					    </div>
					  </div>
			  		@endforeach
			  </div>

			  <form action="/comments/" method="post" class="ui reply form">
			  		{{ csrf_field() }}
			    <div class="field">
			      <textarea name="body"></textarea>
			    </div>
			    <input type="hidden" name="talk_id" value="{{$talk->id}}">
			    <button class="ui primary submit labeled icon button">
			      <i class="icon edit"></i> Add Comment
			    </button>
			  </form>
			</div>
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
@endsection
