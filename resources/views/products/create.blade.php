@extends('layouts.app')
@section('content')
	<div class="container">
			<h1>product.create</h1>
			<div class="card">
				<div class="card-header">Create new products</div>
				<div class="card-body">
					<form method="post" action="/profile/products"  enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="text"
									name="name" placeholder="name of product"
									class="form-control" value="{{old('name')}}">

							    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

						</div>

						<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
							<input type="number"
									name="price" placeholder="price of product"
									class="form-control	value="{{old('price')}}">

								@if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
						</div>

						<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
							<textarea name="description" cols="40" rows="5"
										class="form-control"
										value="{{old('description')}}">
							</textarea>

							    @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
						</div>

						<div class="form-group">
							<label class="custom-control custom-checkbox">
							  <input type="checkbox" class="custom-control-input" name="isNegotiable" checked="checked" value=1>
							  <span class="custom-control-indicator"></span>
							  <span class="custom-control-description">Price is negotiable</span>
							</label>
						</div>

						<div class="form-group">
							<input type="file" name="image[]"  multiple="multiple" class="form-control-file">

						</div>
						<button class="btn btn-primary">Store product</button>
					</form> {{-- END FORM --}}
				</div> {{-- END CARD-BODY --}}
			</div> {{-- END CARD-HEADER --}}
	</div> {{-- END CONTAINER --}}
@endsection
