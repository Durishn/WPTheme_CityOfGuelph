<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div id="main" class="wrapper">
	<?php get_sidebar(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php if ( function_exists('yoast_breadcrumb') )
	{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>


			<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>



			<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
