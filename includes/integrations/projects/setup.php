<?php
/**
 * Integrates this theme with the Projects by WooThemes plugin
 * http://wordpress.org/plugins/projects-by-woothemes/
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Support
 */
add_action( 'after_setup_theme', 'woo_projects_support' );


/**
 * Styles
 * Disable stock Projects css and enqueue our own.
 */
add_filter( 'projects_enqueue_styles', '__return_false' );
add_action( 'wp_enqueue_scripts', 'woo_projects_scripts', 10 );


/**
 * Layout
 * Replace Projects wrappers with our own and filter the body class
 */
remove_action( 'projects_before_main_content', 'projects_output_content_wrapper', 10 );
remove_action( 'projects_after_main_content', 'projects_output_content_wrapper_end', 10 );
add_action( 'projects_before_main_content', 'woo_projects_before_content', 10 );
add_action( 'projects_after_main_content', 'woo_projects_after_content', 20 );
add_action( 'projects_archive_description', 'woo_projects_archive_description_wrap', 1 );
add_action( 'projects_archive_description', 'woo_projects_archive_description_wrap_close', 20 );
add_action( 'projects_before_main_content', 'woo_projects_archive_title' );
add_filter( 'projects_show_page_title', '__return_false' );
remove_action( 'projects_after_loop_item', 'projects_template_short_description', 10 );

add_action( 'projects_before_loop',	'woo_projects_product_loop_wrap_open', 40 );
add_action( 'projects_after_loop', 'woo_projects_product_loop_wrap_close', 5 );

add_action( 'pre_get_posts', 'woo_projects_per_page', 1 );


/**
 * Pagination
 * Replace the WooCommerce pagination function with woo_pagination.
 */
remove_action( 'projects_after_loop', 'projects_pagination', 10 );
add_action( 'projects_after_loop', 'woo_projects_pagination', 10 );

remove_action( 'projects_after_single_project', 'projects_single_pagination', 5 );