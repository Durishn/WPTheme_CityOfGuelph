<?php
/**
 * Template Name: Full-width Page Template
 *
 * Description: Created to use with the Divi creator for full width (not sort of full width) pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="main" class="wrapper-fullwidth">
		<div id="primary-fullwidth" class="site-content">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/template-parts/content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php get_footer(); ?>
