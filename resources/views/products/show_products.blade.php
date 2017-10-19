
<div class="row">
	@foreach ($products as $product)
		<div class="col">
			<div class="card" style="width: 20rem;">
			  <div class="card-header">
			  	{{$product->user->name}}
			  </div>
			  @if (!count($product->pictures()->get())) <!-- Picture by default -->
			  	<img class="card-img-top" src="http://lorempixel.com/400/200" alt="Card image cap">
			  @else
			  	<img class="card-img-top" src="{{asset('storage/'.$product->pictures()->first()->path)}}" alt="Card image cap">
			  @endif

			  <div class="card-body">
			    <h4 class="card-title">
			    	<a class="nav-link" href="">{{$product->name}}</a>
			    </h4>
			    <p class="card-text">{{$product->description}}</p>
			    {{$product->isNegotiable}}
			  </div>

			  <div class="card-footer">
			  	<a class="btn btn-outline-danger" href="/profile/products/{{$product->id}}"
			  		onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                        Delete
                </a>
			  	<a class="btn btn-outline-dark" href="/profile/products/edit/{{$product->id}}">Edit</a>
			  	<a class="btn btn-outline-dark" href="/profile/products/edit/image/{{$product->id}}">Manage image</a>

			  	<form id="delete-form" action="/profile/products/{{$product->id}}" method="post"
			  		style="display: none;">
			  		{{ csrf_field() }}
			  		{{ method_field('delete') }}
			  	</form>

			  </div>

			</div>
		</div>
	@endforeach
</div>

