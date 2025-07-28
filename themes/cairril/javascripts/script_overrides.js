$(document).ready(function() {
	"use strict";
	
    $('#primary-nav-wrapper ul.primary-nav li:first-child').append('<img alt="" src="/themes/cairril/images/listen_icon_grey.gif" class="listen-icon">');
	
    $('#primary-nav-wrapper ul.primary-nav li:nth-child(1)').after('<li class="separator"><span class="pipe">|</span></li>');
    $('#primary-nav-wrapper ul.primary-nav li:nth-child(3)').after('<li class="separator"><span class="pipe">|</span></li>');
    
	 $('#primary-nav-wrapper ul.primary-nav li:first-child').append('<a href="#" class="expand-child-menu">expand child menu</a><ul class="sub-menu">		  <li><a href="/collections/show/6">First Person Singular</a></li> <li><a href="/collections/show/8">Mercury Theatre on the Air</a></li>  <li><a href="/collections/show/3">Campbell Playhouse</a></li>  <li><a href="/collections/show/11">Orson Welles Show (Lady Esther)</a></li>  <li><a href="/collections/show/5">Ceiling Unlimited</a></li>  <li><a href="/collections/show/7">Hello Americans</a></li>  <li><a href="/collections/show/13">Orson Welles Almanac</a></li>  <li><a href="/collections/show/14">This is My Best</a></li>  <li><a href="/collections/show/9">Orson Welles Commentaries</a></li>  <li><a href="/collections/show/2">Mercury Summer Theatre of the Air</a></li>  <li><a href="/collections/show/10">Orson Welles Eversharp Almanac</a></li>  <li><a href="/collections/show/15">More</a></li></ul>');

	$('body').addClass('two-col');

});
