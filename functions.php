<?php
require_once( 'inc/post-type/News.php' );

require_once( 'inc/taxonomy/NewsTaxonomy.php' );

require_once( 'inc/ScriptStyle.php' );

add_theme_support( 'post-thumbnails' );

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Events',
		'menu_title' => 'Events',
		'menu_slug'  => 'theme-events',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

}

function filter_news() {
	switch ( $_POST['category'] ) {
		case 'all':
			$args = array( 'post_type' => 'news' );
			break;
		default:
			$args = array( 'post_type' => 'news', 'taxonomy' => $_POST['category'] );
			break;
	}
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
		get_template_part( 'inc/template/item' );
	endwhile;
	endif;
	wp_reset_query();
	wp_die();
}

add_action( 'wp_ajax_filter_news', 'filter_news' );
add_action( 'wp_ajax_nopriv_filter_news', 'filter_news' );

function filter_events() {
	if ( have_rows( 'events', 'option' ) ):
		while ( have_rows( 'events', 'option' ) ): the_row();
			$parent_title = get_sub_field( 'taxonomy' );
			if ( $_POST['category'] == 'all' || $_POST['category'] == $parent_title[0]->term_id ) {
				get_template_part( 'inc/template/item', 'acf' );
			}
		endwhile;
	endif;
	wp_die();
}

add_action( 'wp_ajax_filter_events', 'filter_events' );
add_action( 'wp_ajax_nopriv_filter_events', 'filter_events' );