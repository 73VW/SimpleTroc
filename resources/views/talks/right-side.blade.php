	<div class="ui three top attached steps">
	  <div class="completed step">
	    <i class="handshake icon"></i>
	    <div class="content">
	      <div class="title">Barter</div>
	      <div class="description">
	      	The proposition was accepted!
	      </div>
	    </div>
	  </div>
	  <div class="active @if($talk->isOver()) completed @endif step">
	    <i class="talk outline icon"></i>
	    <div class="content">
	      <div class="title">Talking</div>
	      <div class="description">Where we meet for the change ?</div>
	    </div>
	  </div>
	  <div class="@if($talk->isOver()) active completed @else disabled @endif step">
	    <i class="thumbs outline up icon"></i>
	    <div class="content">
	      <div class="title">Successfuly transaction</div>
	      <div class="description">Verify order details</div>
	    </div>
	  </div>
	</div>
	<div class="ui bottom attached button" tabindex="0">
		@if(!$talk->isOver())
			@if($talk->hasOneOver())
				<a class="fluid ui grey button">Wait until the  user close</a>
			@else
				<a class="fluid ui purple button" href="/talks/close/{{$talk->id}}">Close the conversation</a>
			@endif
		@endif

	</div>
