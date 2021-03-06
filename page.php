<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage TwentyTwelve-CityOfGuelph
 * @link https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph
 */

get_header(); ?>

<div id="main" class="wrapper contentPage">
	<?php if ( function_exists('yoast_breadcrumb') ){yoast_breadcrumb('<div id="top-meta"><p id="breadcrumbs">','</p></div>');} ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); get_template_part( 'partials/template-parts/content', 'page' ); endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
