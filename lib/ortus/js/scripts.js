$(document).ready(function() {

	//Activate the Bootstrap Dropdown
	$('.dropdown-toggle').dropdown();
	//Activate the Bootstrap Carousel
	$('.carousel').carousel({
    	interval: 4000
    });

	$('.widget ul').addClass('nav nav-list');
	$('.current-menu-item').addClass('active');
	$('.comment-edit-link').addClass('btn btn-mini');
	$('.comment-reply-link').addClass('btn btn-mini');
	$('#cancel-comment-reply-link').addClass('btn btn-danger');
});