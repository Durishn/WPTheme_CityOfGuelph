<?php
/**
 * TwentyTwelve-CityOfGuelph functions and definitions
 *
 * @link https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph
 */
ob_start("ob_gzhandler");
/* ADD TWENTYTWELVE THEME SUPPORT*/
// if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
//     function chld_thm_cfg_parent_css() {
//         wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
//     }
// endif;
// add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );



/**
 * Set up theme defaults and registers support for various WordPress features.
 */
function twentytwelveguelph_setup() {
  /* Add support for editor-styles w extra custom css*/
  add_theme_support( 'editor-styles' );
  add_editor_style( 'css/style-editor.min.css' );
}
add_action( 'after_setup_theme', 'twentytwelveguelph_setup' );

/**
 * Return the Google font stylesheet URL if available.
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 */
function cog_get_font_url() {
	$font_url = '';
	$query_args = array(
		'family'  => urlencode( 'Open Sans:400italic,700italic,400,700' ),
		'display' => urlencode( 'fallback' ),
	);
	$font_url   = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	return $font_url;
}

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 */
function cog_mce_css( $mce_css ) {
	$font_url = cog_get_font_url();
	if ( empty( $font_url ) ) { return $mce_css; }
	if ( ! empty( $mce_css ) ) { $mce_css .= ',';}
	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );
	return $mce_css;
}
add_filter( 'mce_css', 'cog_mce_css' );


/**
* Enqueue styles and scripts
*/
function load_cog_css_and_js() {
   // CSS
   wp_enqueue_style( 'style', get_stylesheet_uri() );
   wp_enqueue_style( 'gds-design-system', get_theme_root_uri() . '/TwentyTwelve-CityOfGuelph/css/gds-design-system.css' );
   wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

   // JS
   wp_register_script('defaultJS', get_theme_root_uri() . '/TwentyTwelve-CityOfGuelph/js/CoG-default.js', array('jquery'),'1.0', true);
   wp_enqueue_script('defaultJS');

   // Admin scripts
   if (!is_admin()) {
   	wp_deregister_script('jquery');
   	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"), false);
   	wp_enqueue_script('jquery');
   }

   $font_url = cog_get_font_url();
   if ( ! empty( $font_url ) ) {
     wp_enqueue_style( 'cog-fonts', esc_url_raw( $font_url ), array(), false);
   }
}
add_action( 'wp_enqueue_scripts', 'load_cog_css_and_js' );



/**
 * Filter the page menu arguments.
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 */
function cog_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) ) {$args['show_home'] = true;}
	return $args;
}
add_filter( 'wp_page_menu_args', 'cog_page_menu_args' );



/**
 * Register widget areas.
 */
function cog_widgets_init() {
  register_sidebar(
		array(
			'name'          => __( 'Main Sidebar', 'twentytwelve' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'First Front Page Widget Area', 'twentytwelve' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Second Front Page Widget Area', 'twentytwelve' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
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
}
add_action( 'widgets_init', 'cog_widgets_init' );


if ( ! function_exists( 'cog_content_nav' ) ) :
	/**
	 * Displays navigation to next/previous pages when applicable.
	 *
	 * @since Twenty Twelve 1.0
	 */
	function cog_content_nav( $html_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
			</nav><!-- .navigation -->
			<?php
	endif;
	}
endif;

if ( ! function_exists( 'cog_entry_meta' ) ) :
	/**
	 * Set up post entry meta.
	 *
	 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
	 *
	 * Create your own cog_entry_meta() to override in a child theme.
	 *
	 * @since Twenty Twelve 1.0
	 */
	function cog_entry_meta() {
		/* translators: Used between list items, there is a space after the comma. */
		$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

		/* translators: Used between list items, there is a space after the comma. */
		$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

		$date = sprintf(
			'<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$author = sprintf(
			'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			/* translators: %s: Author display name. */
			esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
			get_the_author()
		);

		if ( $tag_list ) {
			/* translators: 1: Category name, 2: Tag name, 3: Date, 4: Author display name. */
			$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s.', 'twentytwelve' );
		} elseif ( $categories_list ) {
			/* translators: 1: Category name, 3: Date, 4: Author display name. */
			$utility_text = __( 'This entry was posted in %1$s on %3$s.', 'twentytwelve' );
		} else {
			/* translators: 3: Date, 4: Author display name. */
			// $utility_text = __( 'This entry was posted on %3$s', 'twentytwelve' );
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

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 */
function cog_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) ) {
		$classes[] = 'full-width';
	}

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) ) {
			$classes[] = 'two-sidebars';
		}
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) ) {
			$classes[] = 'custom-background-empty';
		} elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) ) {
			$classes[] = 'custom-background-white';
		}
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'cog-fonts', 'queue' ) ) {
		$classes[] = 'custom-font-enabled';
	}

	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'cog_body_class' );














/*      *****       ****      ***     */
// add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor(){return false;}



add_filter( 'wpseo_remove_reply_to_com', '__return_false' );




/*
* Set up excerpt box
*/
add_post_type_support( 'page', 'excerpt' );
add_filter('excerpt_length', 125);
// add_action('edit_form_after_title', function () {
//     echo '<h3>Excerpt</h3>';
//   }
// );
//add_action('edit_form_after_title', 'post_excerpt_meta_box');
// Changing excerpt more




/*
* Move 'beforeeditor' custom fields before the editor
*/
function move_beforeeditor_meta_boxes() {
    # Get the globals:
    global $post, $wp_meta_boxes;

    # Output the "advanced" meta boxes:
    do_meta_boxes( get_current_screen(), 'beforeeditor', $post );

    # Remove the initial "advanced" meta boxes:
    unset($wp_meta_boxes['post']['beforeeditor']);
}
add_action('edit_form_after_title', 'move_beforeeditor_meta_boxes');



/**
* Add custom logo to WP Admin login
*/
function my_custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image:url(/wp-content/uploads/g.jpg) !important; background-size: 84px 84px !important; padding-bottom: 50px !important;}
	</style>';
}
add_action('login_head', 'my_custom_login_logo');

/**
* WP Admin Bar customizations
*/
function mytheme_admin_bar_render() {
  global $wp_admin_bar;
  //remove New post dropdown
  $wp_admin_bar->remove_menu('new-content');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/*
* Prevent TinyMCE from stripping out schema.org metadata
* Edit extended_valid_elements as needed. For syntax, see
* http://www.tinymce.com/wiki.php/Configuration:valid_elements
*
* NOTE: Adding an element to extended_valid_elements will cause TinyMCE to ignore
* default attributes for that element.
* Eg. a[title] would remove href unless included in new rule: a[title|href]
*/
function schema_TinyMCE_init($in) {
    if(!empty($in['extended_valid_elements']))
        $in['extended_valid_elements'] .= ',';
    $in['extended_valid_elements'] .= '@[id|class|style|title|itemscope|itemtype|itemprop|datetime|rel],div,dl,ul,dt,dd,li,i,span,a|rev|charset|href|lang|tabindex|accesskey|type|name|href|target|title|class|onfocus|onblur|alert]';
    return $in;
}
add_filter('tiny_mce_before_init', 'schema_TinyMCE_init' );

/**
*  Remove the h1 tag from the WordPress editor.
*
*  @param   array  $settings  The array of editor settings
*  @return  array             The modified edit settings
*/
function remove_h1_from_editor( $settings ) {
    $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'remove_h1_from_editor' );

/*
* Prevent TinyMCE from removing div tags
*/
function magnium_tinymce_fix( $init ) {
    $init['extended_valid_elements'] = 'div[*], article[*]';
    $init['remove_linebreaks'] = false;
    $init['convert_newlines_to_brs'] = true;
    $init['remove_redundant_brs'] = false;
    return $init;
}
add_filter('tiny_mce_before_init', 'magnium_tinymce_fix');

/*
* Prevent TinyMCE from stripping code
*/
function allow_all_tinymce_elements_attributes( $init ) {
    // Allow all elements and all attributes
    $ext = '*[*]';
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }
    return $init;
}
add_filter('tiny_mce_before_init', 'allow_all_tinymce_elements_attributes');

/**
* Create column to store image size in media library
*
* @param  array $columns
* @return array $columns
*/
function wpse_237131_add_column_file_size( $columns ) {
    $columns['filesize'] = 'File Size';
    return $columns;
}
add_filter( 'manage_upload_columns', 'wpse_237131_add_column_file_size' );

/**
* Store image sizes in media library
*
* @param  array $columns
* @param  array $media_item
*/
function wpse_237131_column_file_size( $column_name, $media_item ) {
  if ( 'filesize' != $column_name || !wp_attachment_is_image( $media_item ) ) {
    return;
  }
  $filesize = filesize( get_attached_file( $media_item ) );
  $filesize = size_format($filesize, 2);
  echo $filesize;
}
add_action( 'manage_media_custom_column', 'wpse_237131_column_file_size', 10, 2 );

/**
*  Add Mobile Dropdown to pages
*/
function theme_slug_filter_the_content( $content ) {
    $custom_content = '[wpv-view name="mobile-child"]';
    $custom_content .= $content;
    return $custom_content;
}
add_filter( 'the_content', 'theme_slug_filter_the_content' );




/*
* Add DIVI builder to Seasonal Posts
*/
function my_et_builder_post_types( $post_types ) {
    $post_types[] = 'seasonal';
    return $post_types;
}
add_filter( 'et_builder_post_types', 'my_et_builder_post_types' );

/*
* This function registers the same custom post type as the The Events Calendar plugin
* http://wordpress.org/extend/plugins/the-events-calendar/
* This also registers WordPress' native categories and tags while associating them with the Events Calendar Plugin
*/
function add_calendar_taxonomy() {
  register_post_type('tribe_events',array(
    'taxonomies' => array('post_tag')
  ));
}
add_action( 'init', 'add_calendar_taxonomy', 0 );

/**
*  Add Events Calender Configurations
*/
function my_custom_init() {
	add_post_type_support('tribe_venue', 'thumbnail' );
	add_post_type_support('tribe_venue', 'excerpt' );
	add_post_type_support('tribe_venue', 'editor' );
}
add_action('init', 'my_custom_init');

/*
* Add additional years for gravity forms (to accommodate EMS request)
*/
function set_max_year( $max_year ) {
    return 2030;
}
add_filter( 'gform_date_max_year', 'set_max_year' );

// removes admin meta boxes for Wordpress News, plugin updates, incoming links
add_filter('widget_text', 'do_shortcode');

// removes Yoast redirect notification when page/post deleted
add_filter('wpseo_enable_notification_post_trash','__return_false');


// allows shortcodes in the text widget
function rw_remove_dashboard_widgets() {
	remove_meta_box('dashboard_incoming_links','dashboard','normal');
	remove_meta_box('dashboard_plugins','dashboard','normal');
	remove_meta_box('dashboard_primary','dashboard','normal');
	remove_meta_box('dashboard_secondary','dashboard','normal');
}
add_action('admin_init','rw_remove_dashboard_widgets');

if ( ! function_exists( 'COG_entry_meta' ) ) :
	/**
	 * Set up post entry meta.
   */
	function COG_entry_meta() {
		/* translators: Used between list items, there is a space after the comma. */
		$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

		/* translators: Used between list items, there is a space after the comma. */
		$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

		$date = sprintf(
			'<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		$author = sprintf(
			'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			/* translators: %s: Author display name. */
			esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
			get_the_author()
		);

		if ( $tag_list ) {
			/* translators: 1: Category name, 2: Tag name, 3: Date, 4: Author display name. */
			$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
		} elseif ( $categories_list ) {
			/* translators: 1: Category name, 3: Date, 4: Author display name. */
			$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
		} else {
			/* translators: 3: Date, 4: Author display name. */
			$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
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

/*
* Load custom widgets from directory
*/
// include_once( get_stylesheet_directory() . '/partials/custom-widgets/for-more-information.php');
include "partials/customTMCE.php";
