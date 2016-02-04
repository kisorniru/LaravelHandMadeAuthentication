
	$(document).on('click','#district, #gender, #submit', function(e){
		
		checkInput();

	});
	
	//For Next Sliding button
	//when its' click
	$('a[data-slide="next"]').on('click', function(){
 
		if( ! checkInput() )
				return false;

	});

function checkInput(){

  		var carouselData = $('.carousel').data('bs.carousel');
  		var currentIndex = carouselData.getItemIndex(carouselData.$element.find('.item.active'))+1;

		if( ! $("input[name='district']").is(':checked') && currentIndex == 1 ) {

			alert('Please Select a District');
			return false;
		} else if ( ! $("input[name='gender']").is(':checked') && currentIndex == 2 ) {

			alert('Please Select gender');
			return false;
		} else if ( ! $("input[name='cityBased']").is(':checked') && currentIndex == 3 ) {

			if($("input[name='cityBasedOthers']").val()) return $('.carousel').carousel('next');
			alert('Please Select City');
			return false;
		} else if ( !$("input[name='loan-question']").is(':checked') && currentIndex == 4 ) {

			alert('Please Select a loan type');
			return false;
		} else if ( !$("input[name='employed']").is(':checked') && currentIndex == 5 ) {

			alert('Please select an employement');
			return false;
		}
		
		return $('.carousel').carousel('next');
}	