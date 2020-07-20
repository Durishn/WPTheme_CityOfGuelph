<?php
/**
 * Template Name: Default Template, No Sidebar
 *
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
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'partials/template-parts/content', 'page' ); ?>

				<!-- Support visualization of 'For more information' section -->
				<?php if ( get_post_meta( get_the_ID(), 'contact_visibility', true ) == 1) : ?>
					<br />
					<div class="custom-entry-content">
						<h2>For more information</h2>
						<strong><?php if (get_field('contact_name')):the_field('contact_name');endif;
						if (get_field('contact_name') && get_field('contact_position')): echo ' | ';endif;
						if (get_field('contact_position')):the_field('contact_position');endif;?> </strong><?php
						if (get_field('contact_name') || get_field('contact_position')): echo '<br />';endif;
						if (get_field('contact_department')):the_field('contact_department');echo '<br />';endif;
						if (get_field('contact_organization')):the_field('contact_organization');echo '<br />';endif;
						if (get_field('contact_organization_address')):the_field('contact_organization_address');echo '<br />';endif;
						if (get_field('contact_phone')):the_field('contact_phone');endif;if (get_field('contact_extension')): echo " ext: "; the_field('contact_extension'); echo "<br />";endif;
						if (get_field('contact_email')): echo '<a href="mailto:'; the_field('contact_email'); echo '">'; the_field('contact_email'); echo '</a>';endif;
					echo '</div>';
				endif;


			endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
