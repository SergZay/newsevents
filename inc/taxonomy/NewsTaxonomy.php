<?php
namespace Taxonomy;

class NewsTaxonomy {

	private $name = 'Categories';
	private $singular_name = 'Categories';

	// Register Custom Taxonomy
	public function register() {

		$labels = array(
			'name'               => $this->name,
			'singular_name'      => $this->singular_name,
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New ' . $this->singular_name,
			'edit_item'          => 'Edit ' . $this->singular_name,
			'new_item'           => 'New ' . $this->singular_name,
			'all_items'          => 'All ' . $this->name,
			'view_item'          => 'View ' . $this->name,
			'search_items'       => 'Search ' . $this->name,
			'not_found'          => 'No ' . strtolower( $this->name ) . ' found',
			'not_found_in_trash' => 'No ' . strtolower( $this->name ) . ' found in Trash',
			'parent_item_colon'  => '',
			'menu_name'          => $this->name
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'taxonomy', array( 'news', ), $args );

	}

	public function __construct() {

		add_action( 'init', array( $this, 'register' ) );
	}
}

new NewsTaxonomy();
?>
