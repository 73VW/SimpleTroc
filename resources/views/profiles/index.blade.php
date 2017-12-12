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
			  	<div class="floating ui blue label">5</div>
			  </a>
			  <a class="item" data-tab="third">	<i class="talk outline icon" ></i> Livraisons
			  	<div class="floating ui green label">2</div>
			  </a>
			</div>

			<div class="ui bottom attached tab segment active" data-tab="first">
				@for ($i = 0; $i < 140; $i++)
					<div class="ui list">
					  <div class="item">
					    <img class="ui avatar image" src="https://picsum.photos/200/300">
					    <div class="content">
					      <a class="header">Rachel</a>
					      <div class="description">Last seen watching <a><b>Arrested Development</b></a> just now.</div>
					    </div>
					  </div>
					</div>
				@endfor
			</div>

	        <div class="ui bottom attached tab segment" data-tab="second">
				<div class="ui items">
					@for ($i = 0; $i < 5; $i++)
					  <div class="item">
						    <a class="ui tiny image red card">
						      <img src="https://picsum.photos/200/">
						    </a>
						    <div class="content">
						      <a class="header">Stevie Feliciano</a>
						      <div class="description">
						        <p>Stevie Feliciano is a <a>library scientist</a> living in New York City. She likes to spend her time reading, running, and writing.</p>
						      </div>
						    </div>
						    @if ($i%2 == 0)
						    		<div class="ui vertical labeled icon buttons">
										<div class="ui animated button negative" tabindex="0">
										  <div class="visible content">Refuser</div>
										  <div class="hidden content">
										    <p>Êtes-vous sûr ?</p>
										  </div>
										</div>
										<div class="ui animated button" tabindex="0">
										  <div class="visible content"> <i class="money icon"></i>Vendre</div>
										  <div class="hidden content">
										    <i class="credit card alternative icon"></i>
										  </div>
										</div>
									</div>
							@else
									<div class="ui vertical labeled icon buttons">
										<div class="ui animated button negative" tabindex="0">
										  <div class="visible content">Refuser</div>
										  <div class="hidden content">
										    <p>Êtes-vous sûr ?</p>
										  </div>
										</div>
										<div class="ui animated button" tabindex="0">
										  <div class="visible content"> <i class="unhide icon"></i>Echanger</div>
										  <div class="hidden content">
										    <i class="arrow right icon"></i>
										  </div>
										</div>
									</div>
						    @endif

					  </div>
					@endfor
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="third">
				<div class="ui four cards">
				@for ($i = 0; $i < 10; $i++)
					 <div class="ui raised red card">
					  <div class="content">
					    <div class="header">Laptop Lenevo</div>
					    <div class="meta">
					      <span class="category">Ordinateur/Electronique</span>
					    </div>
					    <div class="description">
					      <p>On se retrouve où pour l'échange ?</p>
					    </div>
					  </div>
					  <div class="extra content">
						<div class="left floated">
							<button class="ui blue inverted button">
							 Répondre
							</button>
						</div>
					    <div class="right floated author">
					      <img class="ui avatar image" src="https://picsum.photos/200/""> Matt
					    </div>
					  </div>
					</div>
				@endfor
				</div>
			</div>
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
