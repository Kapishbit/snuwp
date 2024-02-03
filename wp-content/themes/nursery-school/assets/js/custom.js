jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function nursery_school_resmenu() {

  /* First and last elements in the menu */
  var nursery_school_firstTab = jQuery('.main-menu-navigation ul:first li:first a');
  var nursery_school_lastTab  = jQuery('.sidebar .closebtn'); /* Cancel button will always be last */

  jQuery(".resToggle").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("mobilemenu-open");
    nursery_school_firstTab.focus();
  });

  jQuery(".sidebar .closebtn").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("mobilemenu-open");
    jQuery(".resToggle").focus();
  });

  /* Redirect last tab to first input */
  nursery_school_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('mobilemenu-open'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      nursery_school_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  nursery_school_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('mobilemenu-open'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      nursery_school_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.sidebar').on('keyup', function(e){
    if (jQuery('body').hasClass('mobilemenu-open'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('mobilemenu-open');
      nursery_school_lastTab.focus();
    };
  });
}

jQuery(document).ready(function () {

	nursery_school_resmenu();

});

(function( $ ) {

	$(window).scroll(function(){
	  var sticky = $('.sticky-menubox'),
      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('fixed-menubox');
	  else sticky.removeClass('fixed-menubox');
	});

})( jQuery );