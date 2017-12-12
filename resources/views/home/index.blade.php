@extends('layouts.app')

<style type="text/css">

	.card{
		margin-right: 5%;
		margin-bottom: 5%;
		margin-top: 2%; 
		width: 27%;
	}
	
	#products{
		margin-left: 5%;
		padding-left: 10px;
		position: absolute;
		float: left;
		width: 85%;
		height: 70vh;
	}

	#search_bar{
		margin-left: 5%;
	}

	#categories{
		position: absolute;
		margin-left: 90%;
		float: right;
		widows: 10%;
		top: 50px;
    	position:fixed !important;
		right:0;
		bottom:0;
		left:0;
	}

	.card .description{
		height: 10%;
		overflow: hidden;
    	display: -webkit-box;
    	-webkit-line-clamp: 2;
    	-webkit-box-orient: vertical;
	}

	.card .card-text, .card .card-title{
		padding-left: 7%;
		padding-right: 7%;
	}

	.paginationPerso{
		width: 100%;
		padding-left: 45%;
	}

	.bouton{
		margin-left: 0%;
		margin-right: -5%;
	}
</style>

@section('content')
<?php 
Carbon\Carbon::setLocale("fr");
$i = 0;
?>
<div class="container-fluid">
	<div class="row" style="margin-left: 3%;">
		<div id="search_bar" class="col-sm-8">
			<div class="row">
				<input type="text" placeholder="Recherche" class="form-control left-rounded col-sm-10">
				<div class="input-group-btn">
                    <button type="submit" class="btn btn-inverse col-sm-12 right-rounded">Chercher</button>
                </div>
			</div>
		</div>
		<div class="col-sm-2 boutons" style="margin-top: 2px;">
			<div class="row">
				<bouton id="grid" class="btn btn-outline-secondary active fa fa-th col-sm-3" aria-hidden="true" href="#"></bouton>
				<bouton id="list" class="btn btn-outline-secondary fa fa-list col-sm-3" aria-hidden="true" href="#"></bouton>	
			</div>
		</div>
	</div>
	<div id="products" class="list-unstyled row">
	    @foreach($products as $product)
	    <div class="card item element">
		    <div class="thumbnail">
		        <div class="owl-carousel owl-theme">
		        	@foreach($product->pictures()->get() as $picture)
		       			<div class="owl-item">
		   					<div class="item">
		        				<img class="image card-img-top" src="{{$picture->link()}}" alt="Card image cap" width="350" height="200">
		        			</div>
		        		</div>
		       		@endforeach
		        </div>
		        <div class="card-body">
		            <div class="row head">
		            	<h4 class="card-title col-sm-8" id="pname{{$i}}">{{$product->name}}</h4>
		            	<button class="btn btn-outline-secondary fa fa-user-circle-o col-sm-3" id="ubtn{{$i}}" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="{{$product->user()->first()->name}}" onmouseover="hoverButton(this);"> </button>
		            </div>
		            <div class="row description">
		            	<p class="card-text">{{$product->description}}</p>
		           	</div>
			        <div class="row details">
			            <div class="col-sm-6 card-text price" id="pPrice{{$i}}">
			               <p class="lead">{{$product->price}} frs</p>
		                </div>
		                <div class="col-sm-3 bouton" id="ebtn{{$i}}">
			                <a class="btn btn-primary fa fa-exchange" aria-hidden="true" href="#"></a>
			            </div>
			            <div class="col-sm-3 bouton" id="mbtn{{$i++}}">
			                <a  class="btn btn-success fa fa-money" aria-hidden="true" href="#"></a>
			            </div>
			        </div>
		        </div>
		        <div class="card-footer text-muted">
		        	<p class="row card-text date">{{$product->created_at->diffForHumans()}}</p>
		       	</div>
		    </div> 
	    </div>
        @endforeach	
        <div class="row paginationPerso">
	    	{{$products->links()}}
	    </div>
    </div>
	<div id="categories" style="background-color: #563d7c;">
    	<ul class="list-group">		
	    	@foreach(\App\Category::all() as $category)
				<li class="list-group-item" style="background-color: #563d7c;"><a href="#" class="nav-link">{{$category->name}}</a></li>
			@endforeach
		</ul>
    </div>
</div>
@endsection