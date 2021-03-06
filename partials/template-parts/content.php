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

		<!-- ACF View Support -->
		<?php if ( get_post_meta( get_the_ID(), 'latest_updates_visibility', true ) == 'bottom') : ?>
			<?php get_template_part( 'partials/template-parts/latest-updates', 'entry' ); ?>
		<?php endif;?>

	</div><!-- .entry-content -->
	<?php endif; ?>

	<div class="entry-meta">
		<?php COG_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
			</div><!-- .author-avatar -->
			<div class="author-description">
				<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
				<p><?php the_author_meta( 'description' ); ?></p>
				<div class="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
					</a>
				</div><!-- .author-link	-->
			</div><!-- .author-description -->
		</div><!-- .author-info -->
		<?php endif; ?>
	</div><!-- .entry-meta -->

</article><!-- #post -->
