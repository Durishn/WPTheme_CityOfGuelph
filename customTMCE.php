<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class TinyMCE_ABBR {
	function __construct() {
		if ( is_admin() ) {
			add_action( 'init', array(  $this, 'setup_tinymce_abbr' ) );
		}
	}

	//Check if the current user can edit Posts or Pages, and is using the Visual Editor
	function setup_tinymce_abbr() {
		// Check if the logged in WordPress User can edit Posts or Pages
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {return;}
		// Check if the logged in WordPress User has the Visual Editor enabled
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_abbr' ) );
		add_filter( 'mce_buttons_2', array( &$this, 'add_tinymce_abbr_toolbar_button' ) );
	}

	function add_tinymce_abbr( $plugin_array ) {
		$plugin_array['tinymce_abbr_class'] = get_stylesheet_directory_uri().'/js/tinymce/tinymce-abbr.js';
		return $plugin_array;
	}

	function add_tinymce_abbr_toolbar_button( $buttons ) {
		array_push( $buttons, 'tinymce_abbr_class' );
		return $buttons;
	}
}




class TinyMCE_prettylink {
	function __construct() {
		if ( is_admin() ) {
			add_action( 'init', array(  $this, 'setup_tinymce_prettylink' ) );
		}
	}
	// Check if the current user can edit Posts or Pages, and is using the Visual Editor
	function setup_tinymce_prettylink() {
		// Check if the logged in WordPress User can edit Posts or Pages
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
        	return;
		}

		// Check if the logged in WordPress User has the Visual Editor enabled
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_prettylink' ) );
		add_filter( 'mce_buttons', array( &$this, 'add_tinymce_prettylink_toolbar_button' ) );
	}
	function add_tinymce_prettylink( $plugin_array ) {
		$plugin_array['tinymce_prettylink_class'] = get_stylesheet_directory_uri().'/js/tinymce/tinymce-prettylink.js';
		return $plugin_array;
	}
	function add_tinymce_prettylink_toolbar_button( $buttons ) {
		array_push( $buttons, 'tinymce_prettylink_class' );
		return $buttons;
	}
}




class TinyMCE_prettybtn {
	function __construct() {
		if ( is_admin() ) {
			add_action( 'init', array(  $this, 'setup_tinymce_prettybtn' ) );
		}
	}
	// Check if the current user can edit Posts or Pages, and is using the Visual Editor
	function setup_tinymce_prettybtn() {
		// Check if the logged in WordPress User can edit Posts or Pages
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
        	return;
		}

		// Check if the logged in WordPress User has the Visual Editor enabled
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_prettybtn' ) );
		add_filter( 'mce_buttons', array( &$this, 'add_tinymce_prettybtn_toolbar_button' ) );
	}
	function add_tinymce_prettybtn( $plugin_array ) {
		$plugin_array['tinymce_prettybtn_class'] = get_stylesheet_directory_uri().'/js/tinymce/tinymce-prettybtn.js';
		return $plugin_array;
	}
	function add_tinymce_prettybtn_toolbar_button( $buttons ) {
		array_push( $buttons, 'tinymce_prettybtn_class' );
		return $buttons;
	}
}





if ( is_admin() ) {
	$TinyMCE_prettylink = new TinyMCE_prettylink;
	$TinyMCE_ABBR = new TinyMCE_ABBR;
	$TinyMCE_prettybtn = new TinyMCE_prettybtn;
}
