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

			  	@if (count($productHasBarters))
			  	<div class="floating ui blue label"> {{count($productHasBarters)}}</div>
			  	@endif
			  </a>
			  <a class="item" data-tab="third">	<i class="talk outline icon" ></i> Livraisons/Conversations
			  	<div class="floating ui green label">{{count($talks)}}</div>
			  </a>
			</div>

			<div class="ui bottom attached tab segment active" data-tab="first">
				@if (count($barters))
					@foreach ($barters as $barter)
						@if ($barter->isRefuse && !$barter->isClose)
							<div class="ui red card">
							  <div class="content">
							  	<div class="ui red top attached label">A décliner votre offre !</div>
							    <div class="header">A <i class="exchange icon"></i> B</div>
							    <div class="meta">
							      <span class="left floated time">2 days ago</span>
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
							  	<div class="ui top attached label">En attente d'une réponse...</div>
							    <div class="header">A <i class="exchange icon"></i> B</div>
							    <div class="meta">
							      <span class="left floated time">2 days ago</span>
							    </div>
							    <div class="description">
							      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum ipsum ea illo nihil excepturi odio maxime magni libero nobis atque necessitatibus perferendis facilis, animi dolores molestiae consectetur blanditiis harum doloribus!</p>
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
							      Matt
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
					<button class="btn btn-info float-right"><i class="undo icon"></i></button>
					<div class="alert alert-primary float-left" role="alert">
					  Pas de troc en cours...
					</div>

				@else
				<div class="ui items stacked segment">
					@foreach ($productHasBarters as $product)
						@foreach ($product->barters()->get() as $barter)
						  <div class="item">
							    <a class="ui tiny image red card">
							      <img src="https://picsum.photos/200/">
							    </a>
							    <div class="content">
							      <a class="header">{{$barter->getUserTroc()->name}}</a>
							      <div class="description">
							        <p class="lead">Vous propose d'échanger son <strong>{{$barter->getUserProductTroc()}}</strong> contre votre produit <strong>{{$product->name}}</strong> </p>
							      </div>
									<div class="ui buttons float-right">
									  <a href="/barters/accept/{{$barter->id}}" class="ui button blue">Accepter</a>

									  <div class="or"></div>
									  <a href="/barters/delete/{{$barter->id}}" class="ui button red">Refuser</a>
									</div>
							    </div>
						  </div>
					  @endforeach
					@endforeach
				</div>
				@endif

			</div>
			<div class="ui bottom attached tab segment" data-tab="third">
				<div class="ui four cards">
				@foreach ($talks as $talk)
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
								    @if ($talk->lastComment())
								      <a class="author">Matt</a>
								      <div class="metadata">
								        <span class="date">{{$talk->lastComment()->created}}</span>
								      </div>
								      <div class="text">
								        {{$talk->lastComment()->body}}
								      </div>
								    @else
								    	<p><strong>Aucun message échanger...</strong></p>
								    @endif
								    </div>
								  </div>
								</div>
							<a href="/talks/show/{{$talk->id}}" class="ui mini purple inverted button">
							 Show
							</a>
						</div>
					    <div class="right floated meta">
					    	Last message : {{$talk->lastComment()->created_at->diffForHumans()}}
					    </div>
					  </div>
					</div>
				@endforeach
				</div>
			</div>
    	</div>
    </div>
</div>
@include('profiles/fragments/modal_choose_item');
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
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
</script>
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/assets/owl.carousel.min.css">
@endsection

@section('scripts')
 <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<script>
	$(document).ready(function(){
  		$(".owl-carousel").owlCarousel({
  			items:5,
  			loop: true,
		    autoplay:true,
		    autoplayTimeout:3000,
		    autoplayHoverPause:true
  		});
	});

	$('.menu .item').tab();
</script>
@endsection
