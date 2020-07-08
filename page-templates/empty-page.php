<?php
/**
 * Template Name: Empty Template
 * The template for displaying all pages.
 * Author: Nic Durish
 *
 */

get_header(); ?>

<div id="main" class="wrapper emptyPage">
	<div id="primary" >
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); get_template_part( 'partials/template-parts/content', 'page' ); endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
