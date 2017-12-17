@extends('layouts.app')

@section('content')
<div class="container">
	@include('layouts.sessions-flash')
    <div class="row">


        <div class="col-12">
			<div class="ui pointing secondary menu">
			  <a class="item active" data-tab="first">
			  	<i class="feed icon"></i>
			  	Actifs
			   </a>
			  <a class="item" data-tab="second"><i class="handshake icon"></i>Propositions

			  </a>

			  <a class="item" data-tab="third">	<i class="talk outline icon" ></i> Livraisons/Conversations
				  @if(count($talks))
			  	<div class="floating ui green label"> {{count($talks)}}</div>
				@endif
			  </a>
			</div>

			<div class="ui bottom attached tab segment active" data-tab="first">
				@if (count($barters))
					@foreach ($barters as $barter)
						@if ($barter->isRefuse && !$barter->isClose)
							<div class="ui red card">
							  <div class="content">
							  	<div class="ui red top attached label">{{$barter->getUserRightTroc()->name}} décliner votre offre !</div>
							    <div class="header">{{$barter->getUserProductTroc()->name}}<i class="exchange icon"></i> {{$barter->getUserRightProductTroc()->name}}</div>
							    <div class="meta">
							    </div>
							  </div>
							  <div class="extra content">
								<a href="/barters/close/{{$barter->id}}"
								class="ui mini animated red button right floated" tabindex="0">
								  <div class="visible content">Close troc</div>
								  <div class="hidden content">
								    <i class="trash icon"></i>
								  </div>
								</a>
							  </div>
							</div>
						@elseif(!$barter->isRefuse 	&& !$barter->isClose)
							<div class="ui green card">
							  <div class="content">
							  	<div class="ui top attached label">En attente d'une réponse de <strong>{{$barter->getUserRightTroc()->name}}</strong></div>
							    <div class="image">
									<img src="{{$barter->getUserRightProductTroc()->imagePath()}}" class="ui medium image" alt="">
									<img src="{{$barter->getUserProductTroc()->imagePath()}}" class="ui medium image" alt="">
								</div>
							    <div class="meta">
									{{$barter->getUserRightProductTroc()->name}}
							    </div>
							  </div>
							  <div class="extra content">
								<a href="/barters/abort/{{$barter->id}}" class="ui mini animated red button" tabindex="0">
								  <div class="visible content">Annuler</div>
								  <div class="hidden content">
								    <i class="trash outline icon"></i>
								  </div>
								</a>
							    <div class="right floated author">
							      {{$barter->getUserRightTroc()->name}}
							    </div>
							  </div>
							</div>
						@else
							<h3>No activity</h3>
						@endif
					@endforeach
				@else
					<p>No activity</p>
				@endif
			</div>

	        <div class="ui bottom attached tab" data-tab="second">
				@if (!count($productHasBarters))
					<a href="/profile" class="btn btn-info float-right"><i class="undo icon"></i></a>

				@else
				<div class="ui items stacked segment">
						@foreach ($productHasBarters as $product)
							@foreach ($product->barters()->get() as $barter)
							  @if ($barter->isProposition() && !$barter->isRefuse)
								  <div class="item">
									  <div class="ui small move up reveal image">
										<img src="{{$product->imagePath()}}" class="visible content">
										<img src="{{$barter->getUserProductTroc()->imagePath()}}" class="hidden content">
									  </div>
									    <div class="content">

									      <a class="header">{{$barter->getUserTroc()->name}}</a>
									      <div class="description">
									        <p class="lead">Want to trock it's <strong data-tooltip="{{$barter->getUserProductTroc()->description}}" data-position="top center">{{$barter->getUserProductTroc()->name}}</strong> against your product <strong>{{$product->name}}</strong></p>
									      </div>
											<div class="ui buttons float-right">
											  <a href="/barters/accept/{{$barter->id}}" class="ui button blue">Accept</a>

											  <div class="or"></div>
											  <a href="/barters/refuse/{{$barter->id}}" class="ui button red">Refuse</a>
											</div>
									    </div>
								  </div>
							  @endif
						  @endforeach
						@endforeach
					</div>
					@endif
				</div>
				<div class="ui bottom attached tab segment" data-tab="third">
					<div class="ui four cards">
					@foreach ($talks as $talk)
						@if (!$talk->isOver())
						<div class="ui raised red card">
			   			  <div class="content">
			   				   <div class="ui orange right ribbon label">
			   					<i class="announcement icon"></i> {{$talk->getNoReadComment()}}
			   				  </div>
			   				<div class="header">{{$talk->title}}</div>
			   				<div class="meta">
			   				  <span class="category">You are talking with <strong>{{$talk->otherUser()->name}}</strong></span>
			   				</div>
			   				<div class="ui divider"></div>
			   				<div class="description">
			   						<div class="ui comments">
			   						  <div class="comment">
			   							<div class="content">
			   							@if (count($talk->lastComment()))
			   							  <a class="author"{{$talk->lastComment()->getUserName()}}</a>
			   							  <div class="metadata">
			   								<span class="date">{{$talk->lastComment()->created}}</span>
			   							  </div>
			   							  <div class="text">
			   								{{$talk->lastComment()->body}}
			   							  </div>
			   							</div>
			   						  </div>
			   						</div>
			   				</div>
			   				<div class="right floated meta">
			   					Last message : {{$talk->lastComment()->created_at->diffForHumans()}}
			   				</div>
			   				@else
			   					<p><strong>No message yet</strong></p>
			   				@endif
							<a href="/talks/show/{{$talk->id}}" class="ui mini purple inverted button">
			   				 Show
			   				</a>
						@endif
						</div>
					@endforeach
				</div>
			</div>
    	</div>
    </div>
</div>
@include('profiles/fragments/modal_choose_item')
@endsection

@section('css')
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/assets/owl.carousel.min.css">
@endsection

@section('scripts')
	<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/owl.carousel.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
	<script>
		$('.menu .item').tab();

		function showUserStock(user_id){
			axios.get("/api/user/1/products")
			  .then(function (response) {
			    console.log(response);

			  })
			  .catch(function (error) {
			    console.log(error);
			});
		}

		$(document).ready(function(){
	  		$(".owl-carousel").owlCarousel({
	  			items:5,
	  			loop: true,
			    autoplay:true,
			    autoplayTimeout:3000,
			    autoplayHoverPause:true
	  		});
		});
	</script>
@endsection
