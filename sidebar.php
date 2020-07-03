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

			<?php if ( get_post_meta( get_the_ID(), 'contact_visibility', true ) == 1) : ?>
				<div class="custom-sidebar-content well">
					<h3>For more information</h3>
					<p style="padding-left:2px"><strong><?php if (get_field('contact_name')):the_field('contact_name');endif;
					if (get_field('contact_name') && get_field('contact_position')): echo ' | ';endif;
					if (get_field('contact_position')):the_field('contact_position');endif;?> </strong><?php
					if (get_field('contact_name') || get_field('contact_position')): echo '<br />';endif;
					if (get_field('contact_department')):the_field('contact_department');echo '<br />';endif;
					if (get_field('contact_organization')):the_field('contact_organization');echo '<br />';endif;
					if (get_field('contact_organization_address')):the_field('contact_organization_address');echo '<br />';endif;
					if (get_field('contact_phone')):the_field('contact_phone');endif;if (get_field('contact_extension')): echo " extension "; the_field('contact_extension'); echo "<br />";endif;
					if (get_field('contact_email')): echo '<a href="mailto:'; the_field('contact_email'); echo '">'; the_field('contact_email'); echo '</a>';endif;
				echo '</p></div>';
			endif;?>

		</div><!-- #secondary -->
	<?php endif; ?>
