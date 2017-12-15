		<div class="ui comments">
			  <div class="ui segment">
			  		<form action="/comments/" method="post" class="ui reply form">
				  		{{ csrf_field() }}
				  	<div class="ui fluid action input">
					  <input type="text" id="body" name="body"  placeholder="hi! where we meet for the transaction ?">
					  <input type="hidden" name="talk_id" value="{{$talk->id}}">
					  <button type="submit" class="ui purple right labeled icon button">
					    <i class="send icon"></i>
						send
					  </button>
					</div>
				  </form>
			  		@foreach ($comments as $comment)
			  		  <div class="comment">
					    <div class="scrolling content">
					    	@if ($comment->isCurrentUser())
					    	<div class="ui @if ($comment->isRead) green @else red	@endif horizontal label">
					    		<a>it's you</a>
						    	@if ($comment->isRead)
								     <i class="checkmark icon"></i>
								@else
									<i class="hide icon"></i>
						    	@endif
					    	</div>

					    	@else
					    	<div class="ui horizontal label">
					    		<a class="author"><strong>{{$comment->getUserName()}}</strong></a>
					    	</div>
					    	@endif
					      <div class="text">
							  {{$comment->body}}
					      </div>
					      <div class="metadata">
					        <div class="date">{{$comment->created_at->diffForHumans()}}</div>
					      </div>
					    </div>
					  </div>
			  		@endforeach
			  </div>
			</div>
