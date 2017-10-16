@extends('layouts.app')
@section('content')
	<div class="container">
			<h1>product.edit</h1>
			<div class="card">
				<div class="card-header">Create new products</div>
				<div class="card-body">
					<form method="post" action="/profile/products/{{$product->id}}">

						{{ csrf_field() }}
						{{ method_field('put') }}

						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="text"
									name="name" placeholder="name of product"
									class="form-control" value="{{$product->name}}">

							    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
						</div>

						<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
							<input type="number"
									name="price" placeholder="price of product"
									class="form-control" value="{{$product->price}}">

								@if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
						</div>

						<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
							<textarea name="description" cols="40" rows="5" class="form-control">
										{{$product->description}}
							</textarea>

							    @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
						</div>

						<div class="form-group">
							<label class="custom-control custom-checkbox">

							  <input type="checkbox" class="custom-control-input" name="isNegotiable" @if ($product->isNegotiable) checked="checked" @endif value=1>
							  <span class="custom-control-indicator"></span>
							  <span class="custom-control-description">Price is negotiable</span>
							</label>
						</div>
						<button class="btn btn-primary">Update product</button>
					</form> {{-- END FORM --}}
				</div> {{-- END CARD-BODY --}}
			</div> {{-- END CARD-HEADER --}}
	</div> {{-- END CONTAINER --}}
@endsection
