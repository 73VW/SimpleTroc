<div class="card" style="margin-bottom:10px; background-color: #22427C; color:white">
  <div class="body"><h1 class="display-4 text-center">Produit voulu</h1></div>
</div>
<div class="card">
  <div class="card-body">
      <table class="table table-hover">
        <caption>Produit voulu</caption>
        <thead class="thead-light">
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Number of image</th>
          </tr>
        </thead>
        <tbody>
          <tr id="product_{{$wanted->id}}">
            @if (count($wanted->pictures()->get()))
            <td class="align-middle">
              <img src="{{$wanted->pictures()->first()->link()}}" alt="" class="img-fluid" width="200px" height="200px">
            </td>
            @else
              <td class="align-middle">no image</td>
            @endif
            <td class="align-middle">{{$wanted->name}}</td>
            <td class="align-middle">{{count($wanted->pictures()->get())}}</td>
          </tr>
        </tbody>
      </table>
  </div><!-- END CARD-BODY -->
</div><!--END CARD -->
<div class="card" style="margin-bottom:10px; background-color: #22427C; color:white">
  <div class="body"><h1 class="display-4 text-center">List of your products</h1></div>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-hover">
      <caption>Which product do you want to troc?</caption>
      <thead class="thead-light">
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Number of image</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      	@foreach ($products as $product)
    	<tr id="product_{{$product->id}}">
          @if (count($product->pictures()->get()))
          <td class="align-middle">
            <img src="{{$product->pictures()->first()->link()}}" alt="" class="img-fluid" width="200px" height="200px">
          </td>
          @else
            <td class="align-middle">no image</td>
          @endif
          <td class="align-middle">{{$product->name}}</td>
          <td class="align-middle">{{count($product->pictures()->get())}}</td>
          <td class="align-middle center">
            <form action="/profile/barter/store" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="my_product_id" value="{{$product->id}}"/>
                <input type="hidden" name="product_id" value="{{$wanted->id}}"><br>
              <input class="btn btn-outline-dark" type="submit" aria-hidden="true" value="Troc">
            </form>
          </td>
        </tr>
      	@endforeach
      </tbody>
    </table>
  </div><!-- END CARD-BODY -->
</div><!--END CARD -->
