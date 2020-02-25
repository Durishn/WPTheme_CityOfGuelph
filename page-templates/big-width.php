<?php
/**
 * Template Name: Big-Width, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
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

	<div id="main" class="wrapper-bigwidth">
		<div id="primary-bigwidth" class="site-content padded10-content">
			<div id="content" role="main">
				<?php if ( function_exists('yoast_breadcrumb') )
				{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
				&nbsp;
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
