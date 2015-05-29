// Events Manager Customizations
// 
// Customizations for the WP Events Manager plugin
// --------------------------------------------------


if (window.jQuery) {
  jQuery(function($) {
    $('.em-calendar-wrapper').on('click', 'a.em-calnav', function(e){
  		e.preventDefault();
  		$(this).closest('.em-calendar-wrapper').addClass('is-loading');
	  }).on('em_calendar_load', function() {
  		$(this).removeClass('is-loading');
	  });
	  
	  $(document).on('submit', '.em-booking-form', function(){
  	  $(this).addClass('is-loading').prepend('<div class="loading"></div>');
  	  $('#em-booking-submit').val('Submitting...');
    }).on('em_booking_complete', function(){
  	  $('.em-booking-form').removeClass('is-loading');
  	  $('.loading').remove();
	  }).on('em_booking_success', function(){
  	  $('#em-booking-submit').val('Success');
  	}).on('em_booking_error em_booking_ajax_error', function(){
  	  $('#em-booking-submit').addClass('btn-error').val('Error');
  	  $('.em-booking-form input:text, .em-booking-form textarea').eq(0).focus();
  	  setTimeout(function(){ 
    	  $('#em-booking-submit').removeClass('btn-error').val('Sign Up!'); 
      }, 3000);
  	});
  });
}