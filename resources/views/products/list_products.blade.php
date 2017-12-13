<div class="card" style="margin-bottom:10px; background-color: #22427C; color:white">
  <div class="body"><h1 class="display-4 text-center">List of your products</h1></div>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-hover">
      <caption>List of products</caption>
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

          <div class="row">
            <a class="btn btn-outline-dark col-md-3" href="/profile/products/edit/{{$product->id}}" id="edit">Edit</a>
            <a class="btn btn-outline-dark col-md-4" href="/profile/products/edit/image/{{$product->id}}">Manage image</a>

            <form id="delete-form" action="/profile/products/{{$product->id}}" method="post" class="col-md-4">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <button id="btnDelete" type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
          </td>
        </tr>
      	@endforeach
      </tbody>
    </table>
  </div><!-- END CARD-BODY -->
</div><!--END CARD -->
