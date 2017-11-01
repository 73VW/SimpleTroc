@if ($errors->any())
	<script>
		swal({
		  title: 'Oops',
		  type : 'error',
		  html:
			  '<div class="alert alert-danger">'+
		        '<ul>'+
		            @foreach ($errors->all() as $error)
		                '<li>{{ $error }}</li>'+
		            @endforeach
		        '</ul>'+
	    	'</div>',
		});
	</script>
@endif
