<div class="custom-sidebar-content well">
  <h3><?php the_field('latest_updates_header');?> </h3>
  <div class="cog-post-excerpt-preview">
    <?php while( have_rows('latest_updates_filter_posts_group') ): the_row();

      $latest_updates_tag = get_sub_field('latest_updates_filter_posts_by');?>

      <?php if ( get_current_user_id() ):?>
        <div class="alert alert-danger">Web authors – Use the tag <strong><?php echo $latest_updates_tag; ?></strong> to display posts here.</div>
      <?php endif; ?>

      <?php $latest_updates_args = null;
      $latest_updates_args = array(
        "posts_per_page" => 3,
        "tag"            => sanitize_title_with_dashes($latest_updates_tag),
        "numberposts"    => 3,


      );
      $latest_updates_posts = new WP_Query( $latest_updates_args );
      if ( $latest_updates_posts -> have_posts() ) :
        while ( $latest_updates_posts -> have_posts() ) :
        $latest_updates_posts -> the_post();?>

        <div class="cog-post-excerpt-item">
          <a class="cog-post-excerpt-title" href="<?php echo get_permalink()?>" ><?php echo get_the_title()?></a>
          <br><span class="post-date"><?php echo get_the_date()?></span>
        </div>

        <?php endwhile;
      endif;
      $latest_updates_args = null;
      wp_reset_postdata();
    endwhile; ?>
  </div>
</div>
