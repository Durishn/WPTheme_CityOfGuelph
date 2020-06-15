<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage TwentyTwelve-CityOfGuelph
 * @link https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
	<div class="featured-post">
		<?php _e( 'Featured post', 'twentytwelve' ); ?>
	</div>
	<?php endif; ?>

	<header class="entry-header">

		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php $my_post_meta = get_post_meta($post->ID, 'wpcf-read-time', true); ?>
			<?php if ( ! empty ( $my_post_meta ) ) { ?>
				Reading time: <?php echo get_post_meta($post->ID, 'wpcf-read-time', true); ?> minutes
			<?php } ?>
		<?php else : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php if ( ! empty ( $my_post_meta ) ) { ?>
			Reading time: <?php echo get_post_meta($post->ID, 'wpcf-read-time', true); ?> minutes
			<?php } ?>
		<?php endif; // is_single() ?>

		<!-- <p style="padding-top:15px;"><?php the_post_thumbnail(); ?></p> -->
		<?php if ( comments_open() ) : ?>
		<div class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
		</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>
	</header><!-- .entry-header -->

	<?php if ( is_tag() || is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post -->
