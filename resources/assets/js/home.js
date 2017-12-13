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

    if($.cookie("products_view") == "list"){
    	list = true;
    	$('#list').trigger("click");
    }
});