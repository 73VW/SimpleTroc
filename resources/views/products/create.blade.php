@extends('layouts.app')
@section('content')
	<div class="container">
			<h1>product.create</h1>
			<div class="card">
				<div class="card-header">Create new products</div>
				{{var_dump($errors->all())}}
				<div class="card-body">
					<form method="post" action="/profile/products"  enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
							<input type="text"
									name="name" placeholder="name of product"
									class="form-control" value="{{old('name')}}">
						</div>

						<div class="form-group">
							<input type="number"
									name="price" placeholder="price of product"
									class="form-control	value="{{old('price')}}">
						</div>

						<div class="form-group">
							<textarea name="description" cols="40" rows="5"
										class="form-control" placeholder="Some description..."
										value="{{old('description')}}">
							</textarea>
						</div>

						<div class="form-group">
							<label class="custom-control custom-checkbox">
							  <input type="checkbox" class="custom-control-input" name="isNegotiable" checked="checked" value=1>
							  <span class="custom-control-indicator"></span>
							  <span class="custom-control-description">Price is negotiable</span>
							</label>
						</div>

						<div class="form-group">
							<input type="file" name="image"  multiple="multiple" class="form-control-file">
						</div>
						<button class="btn btn-primary">Store product</button>
					</form> {{-- END FORM --}}
				</div> {{-- END CARD-BODY --}}
			</div> {{-- END CARD-HEADER --}}
	</div> {{-- END CONTAINER --}}
@endsection
