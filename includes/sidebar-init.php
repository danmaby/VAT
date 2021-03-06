<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Register widgetized areas
if ( ! function_exists( 'the_widgets_init' ) ) {
	function the_widgets_init() {

	    if ( ! function_exists( 'register_sidebar' ) ) {
	        return;
	    }

	    // Footer widgetized areas
		$total = get_option( 'woo_footer_sidebars', 4 );

		if ( ! $total ) {
			$total = 4;
		}

		for ( $i = 1; $i <= intval( $total ); $i++ ) {
			register_sidebar( array( 'name' => sprintf( __( 'Footer %d', 'woothemes' ), $i ), 'id' => sprintf( 'footer-%d', $i ), 'description' => sprintf( __( 'Widgetized Footer Region %d.', 'woothemes' ), $i ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ) );
		}

	} // End the_widgets_init()
}

add_action( 'init', 'the_widgets_init' );
?>