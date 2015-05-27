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
  });
}