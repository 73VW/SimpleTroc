function hoverButton(element){
	$(element).tooltip('show');
}

// function getData(page){
//     $.ajax({
// 		type: "GET",
// 		url: '?page='+page,
// 		success: function(data, textStatus){
// 		    if (data.redirect) {
// 		        // data.redirect contains the string URL to redirect to
// 		        window.location.href = data.redirect;
// 		    }else {
// 		        // data.form contains the HTML for the replacement form
// 		        $("body").empty().html(data);
// 		    }
// 		},
// 		error: function(jqXHR, exception) {
// 	        var msg = '';
// 	        if (jqXHR.status === 0) {
// 	            msg = 'Not connect.\n Verify Network.';
// 	        } else if (jqXHR.status == 404) {
// 	            msg = 'Requested page not found. [404]';
// 	        } else if (jqXHR.status == 500) {
// 	            msg = 'Internal Server Error [500].';
// 	        } else if (exception === 'parsererror') {
// 	            msg = 'Requested JSON parse failed.';
// 	        } else if (exception === 'timeout') {
// 	            msg = 'Time out error.';
// 	        } else if (exception === 'abort') {
// 	            msg = 'Ajax request aborted.';
// 	        } else {
// 	            msg = 'Uncaught Error.\n' + jqXHR.responseText;
// 	        }
// 	        alert(msg);
// 	    }
// 	});
// }

list = true;

$(document).ready(function() {
	
	var image = $('.owl-carousel');
	image.owlCarousel({
	    items:1,
	    loop:true,
	    margin:10,
	    singleItem:true,
	    autoplayTimeout:5000,
	    autoplayHoverPause:true
	});

    $('#grid').click(function(event){
    	if(!list){
    		event.preventDefault();
    		$('#products').addClass('row');
	    	$('#grid').addClass('active');
	    	$('#list').removeClass('active');
	    	$('.owl-carousel').show();
	    	$('.card-body').removeClass('row');
	    	$('.description').removeClass('col-sm-4');
	    	$('.description').addClass('row');
	    	$('.details').removeClass('col-sm-4');
	    	$('.details').addClass('row');
	    	$('.head').addClass('row');
	    	$('.head').removeClass('col-sm-4');
	    	$('.card').addClass('item');
	    	$('.card').removeClass('list-group-item');
	    	for(let i = 0; i<$('.thumbnail').length; i++){
	    		$('#pname'+i+', #ubtn'+i).unwrap();
	    		$('#pPrice'+i+', #btn'+i).unwrap();
	    	}
	    	$('.element').css('width',"27%");
	    	list = true;
	    	$.cookie("products_view","grid");
    	}
    });

    $('#list').click(function(event){
    	if(list){
    		event.preventDefault();
	    	$('#products').removeClass('row');
	    	$('#grid').removeClass('active');
	    	$('#list').addClass('active');
	    	$('.owl-carousel').hide();
	    	$('.card-body').addClass('row');
	    	$('.description').removeClass('row');
	    	$('.description').addClass('col-sm-4');
	    	$('.details').removeClass('row');
	    	$('.details').addClass('col-sm-4');
	    	$('.head').removeClass('row');
	    	$('.head').addClass('col-sm-4');
	    	$('.card').removeClass('item');
	    	$('.card').addClass('list-group-item');
	    	for(let i = 0; i<$('.thumbnail').length; i++){
	    		if($('.wrap1'+i).length <= 0 && $('.wrap2'+i).length <= 0){
	    			$('#pname'+i+', #ubtn'+i).wrapAll("<div class='row wrap1"+i+"'></div>");
	    			$('#pPrice'+i+', #btn'+i).wrapAll("<div class='row wrap2"+i+"'></div>");	
	    		}
	    	}
	    	$('.list-group-item').css('width',"91%");
	    	list = false;
	    	$.cookie("products_view","list");
    	}
    });

    // $(document).on('click', '.pagination a',function(event)
    // {
    //     $('li').removeClass('active');
    //     $(this).parent('li').addClass('active');
    //     event.preventDefault();

    //     var page=$(this).attr('href').split('page=')[1];

    //     getData(page);
    // });

    if($.cookie("products_view") == "list"){
    	list = true;
    	$('#list').trigger("click");
    }
});