<?php
/**
 * Template Name: Landing Page
 * The template for displaying all landing pages with subchildren.
 * Author: Nic Durish
 *
 */

get_header(); ?>

<div id="main" class="wrapper landingPage">
	<?php if ( function_exists('yoast_breadcrumb') ){yoast_breadcrumb('<div id="top-meta"><p id="breadcrumbs">','</p></div>');} ?>
	<div id="primary" class="site-content">
		<div id="content" class="entry-content" role="main">

      <header class="entry-header">
  			<h1 class="entry-title"><?php the_title(); ?></h1>
  		</header>

      <?php if( get_field('header_image') ): ?>
          <img class="aligncenter size-full" src="<?php the_field('header_image'); ?>" />
      <?php endif; ?>

      <!-- Include the Feed Lists section -->
      <?php $feed_col_count = 0;
      if( have_rows('feed_lists') ){
        while ( have_rows('feed_lists') ) : the_row();
          $feed_col_count++;
        endwhile;?>

        <div class="row">
          <?php while ( have_rows('feed_lists') ) : the_row();
            if ($feed_col_count == 1){
              echo '<div class="col-md-12">';
            } elseif ($feed_col_count == 2){
              echo '<div class="col-md-6">';
            } elseif ($feed_col_count == 3){
              echo '<div class="col-md-4">';
            } else {
              echo '<div class="col-md-6">';
            }

            if( get_row_layout() == 'latest_updates' ): ?>
              <div>
                <h2 class="homeheader"><?php the_sub_field('latest_updates_header');?> </h2>
                <?php
                  if ( get_current_user_id() ):?>
                    <div class="alert alert-danger">Web authors – Use the tag <strong><?php echo get_sub_field('latest_updates_filter_posts_tag'); ?></strong> or category <strong><?php echo get_sub_field('latest_updates_filter_posts_cat'); ?></strong> to display posts here.</div>
                  <?php endif;

                  echo do_shortcode( '  [wpv-view name="landing-page-posts-by-tag-and-category" tag="'
                   . get_sub_field('latest_updates_filter_posts_tag') . '" category="'
                  . get_sub_field('latest_updates_filter_posts_cat') . '"]' ); ?>
              </div>
            <?php
            elseif( get_row_layout() == 'upcoming_events' ):?>
              <div>
                <h2 class="homeheader"><?php the_sub_field('upcoming_events_header');?></h2>
                <?php if ( get_current_user_id() ):?>
                  <div class="alert alert-danger">Web authors – Use the event category <strong><?php echo get_sub_field('upcoming_events_filter_category'); ?></strong> to display posts here.</div>
                <?php endif;
                  echo do_shortcode( '  [wpv-view name="Upcoming community events by category" category="' . get_sub_field('upcoming_events_filter_category') . '"]' );?>
              </div>
            <?php
            elseif( get_row_layout() == 'manual_listing_block' ):?>
              <div>
                <h2 class="homeheader"> <?php echo get_sub_field ('list_title'); ?> </h2>
                <ul>
                  <?php while( have_rows('list_item') ): the_row(); ?>
                  <li>
                    <a href="<?php the_sub_field('list_item_url'); ?>"><?php the_sub_field('list_item_text'); ?></a>
                  </li>
                  <?php endwhile;?>
                </ul>
              </div>
            <?php endif;
            echo '</div>';
          endwhile?>
        </div>
      <?php } ?>



      <!-- Include the Buttons section -->
      <?php $block_array_colors = array(
          0    => "blue",
          1    => "green",
          2  => "red",
          3  => "purple"
      );
      $i = 0;?>
      <div class="custom-block-array">
        <?php while( have_rows('featured_buttons') ): the_row();?>
          <div class="custom-block-wrapper col-md-6">
            <a class="custom-block <?php echo $block_array_colors[$i % 4];?>" href="<?php echo get_sub_field('button_url')?>" ><?php echo get_sub_field('button_text')?></a>
          </div>
          <?php $i++; ?>
        <?php endwhile; ?>
      </div>







      <!-- Include In This Section section -->
			<?php $child_pages = get_pages( array(
        'child_of'      => get_the_ID(),
        'parent'        => get_the_ID(),
        'post_type'     => 'page',
        'sort_order'    => 'asc',
        'sort_column'   => 'post_title',
      ) );
      if ($child_pages) { ?>
        <div class="pagechildren-nav-display">
          <h2 class="pagechildren-nav-display-header">In this section…</h2>
          <ul class="pagechildren-nav-display-list">
            <?php foreach ($child_pages as $child_page) {?>
             <li><div><h3>
               <?php echo '<a href="'.get_permalink($child_page->ID).'">'.$child_page->post_title.'</a>';?>
              </h3>
              <?php echo '<p>'.$child_page->post_excerpt.'</p>';?>
             </div></li>
            <?php }
           echo '</ul></div>';
       }?>


       <!-- Include Extra Entry Content section -->
       <?php if (get_field('extra_page_content')):echo '<hr><div class="entry-content">';the_field('extra_page_content');echo '</div>';endif;?>


       <!-- Include For More Information section -->
       <?php if ( get_post_meta( get_the_ID(), 'contact_visibility', true ) != 'none') : ?>
 				<?php get_template_part( 'partials/template-parts/for-more-information', 'bottom' ); ?>
 			<?php endif;?>


		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
