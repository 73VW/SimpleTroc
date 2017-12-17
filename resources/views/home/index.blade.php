@extends('layouts.app')

@section('content')
<?php
Carbon\Carbon::setLocale("fr");
$i = 0;
?>
<div class="container-fluid" id="main">

    @include('layouts.sessions-flash')
    <div class="row" style="padding-left: 3%;">
        <div class="col-md-8" id="search_bar" >
			<form action="{{route('home', $_GET)}}" method="GET" class="col-md-12">
            	<div class="row">
            		<input type="text" class="form-control col-md-10" placeholder="Recherche" aria-describedby="basic-addon2" name="search" 
            			@if(isset($_GET['search']))
                      	value="{{$_GET['search']}}"
                      	@else
                      	value=""
                        @endif>
	                <button type="submit" class="btn btn-inverse col-md-2" id="basic-addon2">Chercher</button>
	            </div>
            </form>
        </div>
        <div class="col-md-2" style="padding-top: 2px;">
            <div class="col-md-12 boutons">
                <button id="grid" class="btn btn-outline-secondary active fa fa-th col-md-4" aria-hidden="true" href="#"></button>
                <button id="list" class="btn btn-outline-secondary fa fa-list col-md-4" aria-hidden="true" href="#"></button>
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
                            <a href="{{$picture->link()}}"><img class="image card-img-top" src="{{$picture->link()}}" alt="Card image cap" ></a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-body">
                    <div class="row head">
                        <h4 class="card-title col-sm-8" id="pname{{$i}}">{{$product->name}}</h4>
                        <button class="btn btn-outline-secondary fa fa-user-circle-o col-sm-3" id="ubtn{{$i}}" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="{{$product->user()->first()->name}}" onmouseover="$(this).tooltip('show');"> </button>
                    </div>
                    <div class="row description" id="desc">
                        <p class="card-text">{{$product->description}}</p>
                    </div>
                    <div class="row details">
                        <div class="col-md-7 card-text price" id="pPrice{{$i}}">
                            <p class="lead">{{$product->price}} frs</p>
                        </div>
                        <div class="col-md-5 boutons" id="btn{{$i++}}">
                            @auth
                            <form action="profile/barter/create" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{$product->id}}"><br>
                                <input class="btn btn-primary fa fa-exchange bouton" type="submit" aria-hidden="true" value="&#xf0ec;" style="margin-top: -10%;">
                            </form>
                            @else
                            <a  class="btn btn-success fa fa-lock" aria-hidden="true" href="{{ route('login') }}"></a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="row card-text date">{{$product->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row paginationPerso">
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection
