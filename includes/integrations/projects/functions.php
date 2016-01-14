<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Styles
 * @since   1.0.0
 * @return  void
 */
function woo_projects_scripts() {
	wp_register_style( 'woo-projects-css', get_template_directory_uri() . '/includes/integrations/projects/css/projects.css' );
	wp_enqueue_style( 'woo-projects-css' );

	wp_enqueue_script( 'projects-js', esc_url( get_template_directory_uri() . '/includes/integrations/projects/js/projects.min.js' ) );
}

/**
 * Support Declaration
 * @since   1.0.0
 * @return  void
 */
function woo_projects_support() {
	add_theme_support( 'projects-by-woothemes' );
}

/**
 * Projects per page
 * Set to display 8 projects per page
 * @param  array $query posts query
 * @return array        the modified posts query
 * @since  1.0.0
 */
function woo_projects_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_projects_archive() ) {
        // Display only 1 post for the original blog archive
        $query->set( 'posts_per_page', 12 );
        return;
    }
}