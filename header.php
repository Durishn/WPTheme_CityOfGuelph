<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

  <!--==================== EXTERNAL LINKS ====================-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
  <meta name="google-site-verification" content="U72oytUFHuNuKTIQxRh46jAFknFIb8b1fiurKbNNRQ4" />

  <!--==================== SWIFTYPE ====================-->
  <script type="text/javascript">
    window.addEventListener('DOMContentLoaded', function() {
      (function(w, d, t, u, n, s, e) {
        w['SwiftypeObject'] = n;
        w[n] = w[n] || function() {
          (w[n].q = w[n].q || []).push(arguments);
        };
        s = d.createElement(t);
        e = d.getElementsByTagName(t)[0];
        s.async = 1;
        s.src = u;
        e.parentNode.insertBefore(s, e);
      })(window, document, 'script', '//s.swiftypecdn.com/install/v2/st.js', '_st');

      _st('install', '2Uf14s5P_FWzKkWAy84H', '2.0.0');
    });
  </script>

  <!--==================== eScribe MeetingFrame ====================-->
  <script type="text/javascript">
    function Message_Recieved(event) {
      $("#MeetingsFrame").height(event.data + "px");
    }
    if (window.addEventListener) {
      addEventListener("message", Message_Recieved, false);
    } else {
      attachEvent("onmessage", Message_Recieved);
    }
  </script>
</head>

<body <?php body_class(); ?>>
  <!--==================== GOOGLE TAG MANAGER ====================-->
  <aside aria-label="TagManager">
    <noscript>
      <iframe src="//www.googletagmanager.com/ns.html?id=GTM-K8DL43" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-K8DL43');
    </script>
  </aside>

  <div id="page" class="hfeed site" role="region" aria-label="page wrapper">


    <header id="masthead" class="site-header">
      <?php do_action( 'before' ); ?>

      <div class="row headtoprow">
        <div class="col-sm-4">
          <span id="site-title"><span><a aria-label="Site Logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

            <img id="site-logo" src="/wp-content/uploads/cog_logo.png" alt="guelph.ca homepage" />
          </a></span></span>
        </div>
        <div class="col-sm-8">
          <div class="alignright" style="margin-right:20px;">
            <div class="searchbarwrapper">
              <form>
          			<label for="mainSearch" class="hideStuff">Search:</label>
          			<input type="text" class="st-default-search-input" id="mainSearch" name="textfield" placeholder="What are you looking for?">
                <button type="submit" title="Submit" class='btn btn-link search-btn'>
                  <span class='glyphicon glyphicon-search'></span>
                </button>
        		  </form>
            </div>
          </div>
        </div>
      </div>
      <div id="site-navigation" class="main-navigation" aria-label="Navigation Bar">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
      </div><!-- #site-navigation -->
      <?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
      <img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
      <?php endif; ?>
    </header>
