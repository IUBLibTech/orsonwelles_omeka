$(document).ready(function() {
    $('.main-banner .hamburger-icon a.button').click(function() {
	$('#primary-nav-wrapper div#primary-nav').slideToggle();
	return false;
    });

    $('#primary-nav-wrapper ul.primary-nav li a.expand-child-menu').click(function() {
	$(this).closest('li').toggleClass('expanded-child-menu').find('ul.sub-menu').slideToggle();
	return false;
    });
    
});
