<?php

class ScriptStyle {

	public function css_files() {
		wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css' );
		wp_enqueue_style( 'style-main', get_template_directory_uri() . '/assets/css/main.min.css' );
		wp_enqueue_style( 'style-default', get_stylesheet_uri() );
	}

	public function js_files() {
		if ( ! is_admin() ) {
			wp_deregister_script( 'jquery' );
		}
		add_action( 'wp_head', 'myplugin_ajaxurl' );

		wp_enqueue_script( 'script-name', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
		wp_localize_script( 'script-name', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'css_files' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'js_files' ) );
	}

}

new ScriptStyle();