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

	.description{
		height: 15%;
		overflow: hidden;
    	display: -webkit-box;
    	-webkit-line-clamp: 4;
    	-webkit-box-orient: vertical;
	}
	
	.details{
		position: absolute;
    	bottom: 0;
		padding-left : 15%;
	}

</style>

@section('content')
<div class="container-fluid">
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
			            <h4 class="card-title">{{$product->name}}</h4>
			            <p class="card-text description">{{$product->description}}</p>
			            <div class="row details">
			                <div class="card-text price">
			                	<p class="lead">{{$product->price}} frs</p>
		                    </div>
		                    <div class="col-xs-12 col-md-6 bouton">
			                    <a class="btn btn-success" href="">Add to cart</a>
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