$(document).ready(function() {

	var totalItems = $('.item').length;



	$(document).on('click','#district, #gender, #cityBased, #loan-type, #job-type, #salary, #jobYear, #cincome, #annualbonus,#lasts', function(e){
		e.preventDefault();

		checkInput();

	});
	
	//For Next Sliding button
	//when its' click
	$('a[data-slide="next"]').on('click', function(e){

		e.preventDefault();
  
		checkInput();

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
			
			alert('Please Select City');
			return false;
		} else if ( !$("input[name='loan-question']").is(':checked') && currentIndex == 4 ) {

			alert('Please Select a loan type');
			return false;
		} else if ( !$("input[name='employed']").is(':checked') && currentIndex == 5 ) {

			alert('Please select an employement');
			return false;
		}
		
		console.log(currentIndex);

		return $('.carousel').carousel('next');
}	
	 
});