<?php
/**
 * Template Name: Landing Page Level 3 Page Template
 *
 * Description: This is the default page template for landing pages at the third level
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div id="main" class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php if ( function_exists('yoast_breadcrumb') )
	{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
			&nbsp;
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
