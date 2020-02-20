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
?><!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
         

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
<!--[if lt IE 9]>
<![endif]-->
<?php wp_head(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

<!-- swiftype code -->
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
  (function(w,d,t,u,n,s,e){w['SwiftypeObject']=n;w[n]=w[n]||function(){
  (w[n].q=w[n].q||[]).push(arguments);};s=d.createElement(t);
  e=d.getElementsByTagName(t)[0];s.async=1;s.src=u;e.parentNode.insertBefore(s,e);
  })(window,document,'script','//s.swiftypecdn.com/install/v2/st.js','_st');

  _st('install','2Uf14s5P_FWzKkWAy84H','2.0.0');
});
</script>

<!-- Begin Inspectlet Embed Code -->
	<!--
<script type="text/javascript" id="inspectletjs">
	window.__insp = window.__insp || [];
	__insp.push(['wid', 42137375]);
	(function() {
		function __ldinsp(){var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); }
		if (window.attachEvent){
			window.attachEvent('onload', __ldinsp);
		}else{
			window.addEventListener('load', __ldinsp, false);
		}
	})();
</script>
-->
<!-- End Inspectlet Embed Code -->
<meta name="google-site-verification" content="U72oytUFHuNuKTIQxRh46jAFknFIb8b1fiurKbNNRQ4" />

		<!-- Removed duplicate jQuery and updated core jQuery in functions -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
        <script type="text/javascript">
            function Message_Recieved(event) {
                $("#MeetingsFrame").height(event.data + "px");
            }
            if (window.addEventListener) {
                addEventListener("message", Message_Recieved, false);
            }
            else {
                attachEvent("onmessage", Message_Recieved);
            }
        </script>


</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K8DL43"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K8DL43');</script>
<!-- End Google Tag Manager -->
<div id="page" class="hfeed site">


	<header id="masthead" class="site-header" role="banner">
	<?php do_action( 'before' ); ?>
	
	<div class="row">
	<div class="col-md-6">
		<span id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img id="site-logo" src="/wp-content/uploads/cog_logo.png" alt="guelph.ca homepage" /></a></span></span>
	</div>
	<div class="col-md-6">


<div class="alignright" style="margin-right:20px;"><label for="mainSearch" class="hideStuff">Search:</label>
<input type="text" id="mainSearch" name="textfield" class="st-default-search-input" placeholder="What are you looking for?">

<div id="google_translate_element" style=" margin-top:15px;"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-2623375-1'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" async></script>
		</div>
		<!-- .alignright ddd-->
	</div>
			
	</div>
			
	

		<nav id="site-navigation" class="main-navigation" role="navigation">
		
			
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
	
