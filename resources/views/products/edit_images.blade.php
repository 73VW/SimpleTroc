@extends('layouts.app')
@section('content')

	<div class="container">
		<div class="card" style="margin-bottom:10px; background-color: #563d7c; color:white">
 			 <div class="body"><h1 class="display-4 text-center">
 			 	Manage images :
 			 	<span class="badge badge-light">
 			 		{{$product->name}}
 			 	</span>
 			 </h1>
			<!-- Small modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Add new img</button>

				<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				    	<div class="card">
				    		<div class="card-body">
				    			<form method="post" action="/profile/pictures/{{$product->id}}"  enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="form-group">
										<input type="file" name="image[]"  multiple="multiple" class="form-control-file">
									</div>
									<br>
									<br>
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Add image</button>
									</div>
								</form>
				    		</div>
				    	</div>

				    </div>
				  </div>
				</div>
 			</div>
		</div>

		<div class="card-columns">
			@foreach ($product->pictures()->get() as $img)
				<div id="picture_{{$img->id}}" class="card">
					<div class="card-body">
						<img src="{{$img->link()}}" alt="" class="img-fluid" width="500px" height="500px">
					</div>
					<div class="card-footer">
						@if (count($product->pictures()->get()) > 1)
						<form id="delete-form" action="/profile/pictures/{{$img->id}}" method="post">
			    			{{ csrf_field() }}
			    			{{ method_field('delete') }}
			    			<button class="btn btn-danger" onclick="performDelete({{$img->id}})" type="submit">delete</button>
			    	  	</form>
						@endif

					</div>
				</div>
			@endforeach
		</div><!-- END CARD-DECK -->
	</div><!-- END CONTAINER -->
@endsection
