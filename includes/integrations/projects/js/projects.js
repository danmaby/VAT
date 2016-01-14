jQuery(document).ready(function($){
	// Products
	jQuery( 'ul.projects li.project' ).hover( function() {
		jQuery( this ).find( 'h3' ).removeClass( 'bounceOutRight' ).addClass( 'animated bounceInLeft' );
	}, function() {
		jQuery( this ).find( 'h3' ).removeClass( 'bounceInLeft' ).addClass( 'bounceOutRight' );
	});
});