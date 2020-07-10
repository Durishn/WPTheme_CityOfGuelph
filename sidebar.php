<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>

			<!-- ACF View Support -->
			<?php if ( get_post_meta( get_the_ID(), 'latest_updates_visibility', true ) == 'sidebar') : ?>
				<?php get_template_part( 'partials/template-parts/latest-updates', 'sidebar' ); ?>
			<?php endif;?>
			<?php if ( get_post_meta( get_the_ID(), 'contact_visibility', true ) == 'sidebar') : ?>
				<?php get_template_part( 'partials/template-parts/for-more-information', 'sidebar' ); ?>
			<?php endif;?>


		</div><!-- #secondary -->
	<?php endif; ?>
