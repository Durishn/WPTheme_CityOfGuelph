<?php
/**
 * Template Name: Empty Page
 * The template for displaying all pages.
 *
 */

get_header(); ?>

<div id="main" class="wrapper contentPage">
	<?php if ( function_exists('yoast_breadcrumb') )
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
	<div id="primary">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
