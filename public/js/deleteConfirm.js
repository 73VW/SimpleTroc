function performDelete(id){
	event.preventDefault();
	swal({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then(function () {
	axios.delete('/profile/products/'+id)
	  .then(function (response) {
	    console.log(response.data);
	    alert(id);
	    $('#product_'+id).remove();
	    swal(
		    'Deleted!',
		    'Your file has been deleted.',
		    'success'
		  )
		});
	  })
	  .catch(function (error) {
	    console.log(error);
	  });
}

