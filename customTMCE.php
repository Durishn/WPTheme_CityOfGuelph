<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class TinyMCE_ABBR {
	/**
	* Plugin constructor.
	*/
	function __construct() {
		if ( is_admin() ) {
			add_action( 'init', array(  $this, 'setup_tinymce_abbr' ) );
		}
	}
	/**
	* Check if the current user can edit Posts or Pages, and is using the Visual Editor
	* If so, add some filters
	*/
	function setup_tinymce_abbr() {
		// Check if the logged in WordPress User can edit Posts or Pages
		// If not, don't register
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
        	return;
		}

		// Check if the logged in WordPress User has the Visual Editor enabled
		// If not, don't register
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		// Setup filters
		#add_action( 'plugins_loaded', 'load_languages_tinymce_abbr' );
		#add_action( 'before_wp_tiny_mce', array( &$this, 'translate_tinymce_abbr' ) );
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_abbr' ) );
		add_filter( 'mce_buttons_2', array( &$this, 'add_tinymce_abbr_toolbar_button' ) );
	}

	/**
	* Adds the plugin to the TinyMCE / Visual Editor instance
	*
	* @param array $plugin_array Array of registered TinyMCE Plugins
	* @return array Modified array of registered TinyMCE Plugins
	*/
	function add_tinymce_abbr( $plugin_array ) {
		$plugin_array['tinymce_abbr_class'] = get_stylesheet_directory_uri().'/js/tinymce-abbr.js';
		return $plugin_array;
	}

	/**
	* Adds a button to the TinyMCE / Visual Editor which the user can click
	* to insert the abbr node tag.
	*
	* @param array $buttons Array of registered TinyMCE Buttons
	* @return array Modified array of registered TinyMCE Buttons
	*/
	function add_tinymce_abbr_toolbar_button( $buttons ) {
		array_push( $buttons, 'tinymce_abbr_class' );
		return $buttons;
	}
}
$TinyMCE_ABBR = new TinyMCE_ABBR;
