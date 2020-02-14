<?php
ob_start("ob_gzhandler");
// Prevent TinyMCE from stripping out schema.org metadata
function schema_TinyMCE_init($in)
{
    /**
     *   Edit extended_valid_elements as needed. For syntax, see
     *   http://www.tinymce.com/wiki.php/Configuration:valid_elements
     *
     *   NOTE: Adding an element to extended_valid_elements will cause TinyMCE to ignore
     *   default attributes for that element.
     *   Eg. a[title] would remove href unless included in new rule: a[title|href]
     */
    if(!empty($in['extended_valid_elements']))
        $in['extended_valid_elements'] .= ',';

    $in['extended_valid_elements'] .= '@[id|class|style|title|itemscope|itemtype|itemprop|datetime|rel],div,dl,ul,dt,dd,li,i,span,a|rev|charset|href|lang|tabindex|accesskey|type|name|href|target|title|class|onfocus|onblur|alert]';

    return $in;
}


// stop wp removing div tags
function magnium_tinymce_fix( $init )
{
    // html elements being stripped
    $init['extended_valid_elements'] = 'div[*], article[*]';
    // don't remove line breaks
    $init['remove_linebreaks'] = false;
    // convert newline characters to BR
    $init['convert_newlines_to_brs'] = true;
    // don't remove redundant BR
    $init['remove_redundant_brs'] = false;
    // pass back to wordpress
    return $init;
}
add_filter('tiny_mce_before_init', 'magnium_tinymce_fix');



/**
 * Displays image size in media library
 */
add_filter( 'manage_upload_columns', 'wpse_237131_add_column_file_size' );
add_action( 'manage_media_custom_column', 'wpse_237131_column_file_size', 10, 2 );

function wpse_237131_add_column_file_size( $columns ) { // Create the column
    $columns['filesize'] = 'File Size';
    return $columns;
}
function wpse_237131_column_file_size( $column_name, $media_item ) { // Display the file size
if ( 'filesize' != $column_name || !wp_attachment_is_image( $media_item ) ) {
  return;
}
$filesize = filesize( get_attached_file( $media_item ) );
$filesize = size_format($filesize, 2);
echo $filesize;
}



/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function twentytwelveguelph_setup() {
	  // Add support for editor styles.
	  add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );
}
add_action( 'after_setup_theme', 'twentytwelveguelph_setup' );


/**
 *  Remove the h1 tag from the WordPress editor.
 *
 *  @param   array  $settings  The array of editor settings
 *  @return  array             The modified edit settings
 */
 add_filter( 'tiny_mce_before_init', 'remove_h1_from_editor' );

function remove_h1_from_editor( $settings ) {
    $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
    return $settings;
}

add_filter('tiny_mce_before_init', 'schema_TinyMCE_init' );

add_action('init', 'my_custom_init');
function my_custom_init() {
	add_post_type_support('tribe_venue', 'thumbnail' );
	add_post_type_support('tribe_venue', 'excerpt' );
	add_post_type_support('tribe_venue', 'editor' );
	}

//add mobile dropdown to pages

function theme_slug_filter_the_content( $content ) {
    $custom_content = '[wpv-view name="mobile-child"]';
    $custom_content .= $content;
    return $custom_content;
}
add_filter( 'the_content', 'theme_slug_filter_the_content' );

//adds divi builder to seasonal posts
function my_et_builder_post_types( $post_types ) {
    $post_types[] = 'seasonal';

    return $post_types;
}
add_filter( 'et_builder_post_types', 'my_et_builder_post_types' );


//adds additional years for gravity forms (to accommodate EMS request)
add_filter( 'gform_date_max_year', 'set_max_year' );
function set_max_year( $max_year ) {
    return 2030;
}



//adds custom css to wysiwyg editor
function my_theme_add_editor_styles() {
    add_editor_style( 'https://guelph.ca/wp-content/themes/TwentyTwelve-CityOfGuelph/style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );


function my_custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image:url(/wp-content/uploads/g.jpg) !important; background-size: 84px 84px !important; padding-bottom: 50px !important;}
	</style>';
	}

	add_action('login_head', 'my_custom_login_logo');

// removes admin meta boxes for Wordpress News, plugin updates, incoming links

add_filter('widget_text', 'do_shortcode');


// removes Yoast redirect notification when page/post deleted

add_filter('wpseo_enable_notification_post_trash','__return_false');

// allows shortcodes in the text widget

add_action('admin_init','rw_remove_dashboard_widgets');
function rw_remove_dashboard_widgets() {
	remove_meta_box('dashboard_incoming_links','dashboard','normal');
	remove_meta_box('dashboard_plugins','dashboard','normal');
	remove_meta_box('dashboard_primary','dashboard','normal');
	remove_meta_box('dashboard_secondary','dashboard','normal');
	}

function twentytwelve_excerpt_length($length){
return 125;
}
add_filter('excerpt_length','twentytwelve_excerpt_length');




// Register footer widgets
register_sidebar( array(

'name' => __( 'Footer Widget One', 'tto' ),

'id' => 'sidebar-4',

'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Left Side.', 'tto' ),

'before_widget' => '<aside id="%1$s">',

'after_widget' => "</aside>",

'before_title' => '<h3>',

'after_title' => '</h3>',

) );

register_sidebar( array(

'name' => __( 'Footer Widget Two', 'tto' ),

'id' => 'sidebar-5',

'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Center.', 'tto' ),

'before_widget' => '<aside id="%1$s">',

'after_widget' => "</aside>",

'before_title' => '<h3>',

'after_title' => '</h3>',

) );

register_sidebar( array(

'name' => __( 'Footer Widget Three', 'tto' ),

'id' => 'sidebar-6',

'description' => __( 'Found at the bottom of every page (except 404s, optional homepage and full width) as the footer. Right Side.', 'tto' ),

'before_widget' => '<aside id="%1$s">',

'after_widget' => "</aside>",

'before_title' => '<h3>',

'after_title' => '</h3>',

) );


if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * modified by Greg to remove author name from post.
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

//Admin bar customization
function mytheme_admin_bar_render() {
global $wp_admin_bar;

//remove New post dropdown
$wp_admin_bar->remove_menu('new-content');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

add_post_type_support( 'page', 'excerpt' );


/* IMPORTANT !
* This function registers the same custom post type as the The Events Calendar plugin
* http://wordpress.org/extend/plugins/the-events-calendar/
* This also registers WordPress' native categories and tags while associating them with the Events Calendar Plugin
*/
add_action( 'init', 'add_calendar_taxonomy', 0 );
function add_calendar_taxonomy() {
register_post_type('tribe_events',array( // Registers Events Calendar Custom Post Type
'taxonomies' => array('post_tag') // This registers the native WordPress taxonomies with The Events Calendar
));
}

// stops wysiwyg editor from stripping code

function allow_all_tinymce_elements_attributes( $init ) {

    // Allow all elements and all attributes
    $ext = '*[*]';

    // Add to extended_valid_elements if it already exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // return value
    return $init;
}
add_filter('tiny_mce_before_init', 'allow_all_tinymce_elements_attributes');
// block WP enum scans
// https://m0n.co/enum
if (!is_admin()) {
	// default URL format
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
	add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request) {
	// permalink URL format
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
	else return $redirect;
}

/** * Install latest jQuery version 3.4.1. */
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_ext1', trailingslashit( get_theme_root_uri() ) . 'TwentyTwelve-CityOfGuelph/./css/colourBlocks.css' );
        wp_enqueue_style( 'chld_thm_cfg_ext2', trailingslashit( get_theme_root_uri() ) . 'TwentyTwelve-CityOfGuelph/./css/btnStyles.css' );
        wp_enqueue_style( 'chld_thm_cfg_ext3', trailingslashit( get_theme_root_uri() ) . 'TwentyTwelve-CityOfGuelph/./css/prettyLinks.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 100 );

// END ENQUEUE PARENT ACTION
