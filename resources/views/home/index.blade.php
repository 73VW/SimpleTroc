@extends('layouts.app')

<style type="text/css">

	.card{
		margin-right: 5%;
		margin-bottom: 5%;
		margin-top: 2%; 
	}
	
	#products{
		margin-left: 5%;
		padding-left: 10px;
		position: absolute;
		float: left;
		width: 90%;
		height: 90%;
	}

	#search_bar{
		margin-left: 10%;
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
		height: 13%;
		overflow: hidden;
    	display: -webkit-box;
    	-webkit-line-clamp: 4;
    	-webkit-box-orient: vertical;
	}
</style>

@section('content')
<div class="container-fluid">
	<div class="row">
		<div id="search_bar" class="col-sm-8">
			<div class="form-group">
				<div class="input-group">
					<input type="text" placeholder="Recherche" class="form-control left-rounded">
					<div class="input-group-btn">
                        <button type="submit" class="btn btn-inverse right-rounded">Chercher</button>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="products" class="list-unstyled row">
	    	@foreach($products as $product)
	    	<div class="card" style="width: 20rem;">
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
			            <h4 class="row card-title">{{$product->name}}</h4>
			            <p class="row card-text description">{{$product->description}}</p>
			            <div class="row details">
			                <div class="col-sm-6 card-text price">
			                	<p class="lead">{{$product->price}} frs</p>
		                    </div>
		                    <div class="col-sm-2 bouton">
			                    <a class="btn btn-primary fa fa-cart-plus" aria-hidden="true" href="#"></a>
			                </div>
			                <div class="col-sm-2 bouton">
			                	<a  class="btn btn-success fa fa-money" aria-hidden="true" href="#"></a>
			                </div>
			            </div>
		        	</div>
		        </div> 
	        </div>
            @endforeach	    	            		
    	</div>
    	<div id="categories" style="background-color: #563d7c;">
    		<ul class="list-group">
    			
	    	@foreach(\App\Category::all() as $category)
				<li class="list-group-item" style="background-color: #563d7c;"><a href="#" class="nav-link">{{$category->name}}</a></li>
			@endforeach

			</ul>
    	</div>
	</div>
</div>
@endsection