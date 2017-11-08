@extends('layouts.app')
@section('content')
<div class="container">
    <div class='well well-sm'>
    	<strong>Category Title</strong>
    	<div class="btn-group">
	        <a href="#" id="list" class="btn btn-default btn-sm">
	        <span class="glyphicon glyphicon-th-list"></span>List</a>
	        <a href="#" id="grid" class="btn btn-default btn-sm">
	       	<span class="glyphicon glyphicon-th"></span>Grid</a>
	    </div>
	</div>
	<div id="products" class="row list-group">	    
	    	@foreach($products as $product)
	    	<div class="item  col-xs-10 col-lg-10">
		        <div class="thumbnail">
		            <img class="group list-group-image" src="{{$product->pictures()->first()->link()}}" alt="" width="350" height="200"/>
		            <div class="caption">
			            <h4 class="group inner list-group-item-heading">{{$product->name}}</h4>
			            <p class="group inner list-group-item-text">{{$product->description}}</p>
			            <div class="row">
			                <div class="col-xs-12 col-md-6">
			                	<p class="lead">{{$product->price}} .-</p>
		                    </div>
		                    <div class="col-xs-12 col-md-6">
			                    <a class="btn btn-success" href="">Add to cart</a>
			                </div>
			            </div>
		        	</div>
		        </div> 
	        </div>
            @endforeach	    	            		
    </div>
</div>
@endsection