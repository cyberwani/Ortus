$(document).ready(function() {

	//Activate the Bootstrap Dropdown
	$('.dropdown-toggle').dropdown();
	
	//Add two classes to the sidebar lists - this way they will be rendered with bootstrap css
	$('.widget ul').addClass('nav nav-list');
	
	//Add active class to current menu item - this way they will be rendered with bootstrap css
	$('.current-menu-item').addClass('active');

	$('.comment-edit-link').addClass('btn btn-mini');
	$('.comment-reply-link').addClass('btn btn-mini');
	$('#cancel-comment-reply-link').addClass('btn btn-danger');
});