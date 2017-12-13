@extends('layouts.app')

@section('content')
<?php 
Carbon\Carbon::setLocale("fr");
$i = 0;
?>
<div class="container-fluid" id="main">
	<div class="row" style="padding-left: 3%;">
		<div class="col-md-8" id="search_bar" >
			<div class="input-group col-md-12">
				<input type="text" class="form-control" placeholder="Recherche" aria-describedby="basic-addon2">
				<span class="input-group-btn">
                	<button type="button" class="btn btn-inverse" id="basic-addon2">Chercher</button>
                </span>
			</div>
		</div>
		<div class="col-md-2" style="padding-top: 2px;">
			<div class="col-md-12 bouton">
				<bouton id="grid" class="btn btn-outline-secondary active fa fa-th col-md-4" aria-hidden="true" href="#"></bouton>
				<bouton id="list" class="btn btn-outline-secondary fa fa-list col-md-4" aria-hidden="true" href="#"></bouton>
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
		            <div class="row description" id="desc">
		            	<p class="card-text">{{$product->description}}</p>
		           	</div>
			        <div class="row details">
			            <div class="col-md-7 card-text price" id="pPrice{{$i}}">
			               <p class="lead">{{$product->price}} frs</p>
		                </div>
			            <div class="col-md-5 bouton" id="btn{{$i++}}">
			            	<a class="btn btn-primary fa fa-exchange" aria-hidden="true" href="#"></a>
			                <a class="btn btn-success fa fa-money" aria-hidden="true" href="#"></a>
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
	<div id="categories" style="background-color: #22427C;">
    	<ul class="navbar-nav" id="categories_list">		
	    	@foreach(\App\Category::all() as $category)
				<a class="nav-link" href="#">{{$category->name}}</a>
			@endforeach
		</ul>
    </div>
</div>
@endsection