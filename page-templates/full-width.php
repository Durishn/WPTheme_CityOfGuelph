<?php
/**
 * Template Name: Default Template, No Sidebar
 *
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div id="main" class="wrapper contentPage">
	<!-- <?php if ( function_exists('yoast_breadcrumb') ){yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> -->
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>

				<!-- Support visualization of 'For more information' section -->
				<?php if ( get_post_meta( get_the_ID(), 'contact_visibility', true ) == 1) : ?>
					<br />
					<div class="custom-entry-content">
						<h2>For more information</h2>
						<strong><?php if (get_field('contact_name')):the_field('contact_name');endif;
						if (get_field('contact_name') && get_field('contact_position')): echo ' | ';endif;
						if (get_field('contact_position')):the_field('contact_position');endif;?> </strong><br />
						<?php if (get_field('contact_department')):the_field('contact_department');?> <br /><?php endif ?>
						<?php the_field('contact_organization'); ?><br />
						<?php the_field('contact_organization_address'); ?><br />
						<?php if (get_field('contact_phone')):the_field('contact_phone');endif;if (get_field('contact_extension')): echo " ext: "; the_field('contact_extension'); echo "<br />";endif;
						if (get_field('contact_email')): echo '<a href="mailto:'; the_field('contact_email'); echo '">'; the_field('contact_email'); echo '</a>';endif;?>
					</div>
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
