
<div class="row">
	@foreach ($products as $product)
		<div class="col">
			<div class="card" style="width: 20rem;">
			  @if (empty(!$product->pictures()->get())) <!-- Picture by default -->
			  	<img class="card-img-top" src="http://lorempixel.com/400/200" alt="Card image cap">
			  @else
			  	<img class="card-img-top" src="{{asset('storage/'.$product->pictures()->first()->path)}}" alt="Card image cap">
			  @endif


			  <div class="card-body">
			    <h4 class="card-title">Card title</h4>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
	@endforeach
</div>

