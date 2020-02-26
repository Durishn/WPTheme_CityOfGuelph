<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/
?>


        <?php if (get_the_modified_time() != get_the_time()) : ?>
          <div class="width100" style="float: left;"><p class="post-date">Last Updated: <?php the_modified_time('F j, Y'); ?>.</p></div>
        <?php else: ?>
          <div class="width100" style="float: left;"><p class="post-date">Posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>. </p></div>
        <?php endif; ?>
      </div>


      <p class="well margin0" aria-label="Notice Board">We’re updating parts of our website. <a href="https://forms.guelph.ca/IT/Website-feedback?Q9=https://guelph.ca/?page_id=<?php the_ID(); ?>&Q8=<?php the_title(); ?>">How can we make it better?</a></p>

      <!--==================== FOOTER ====================-->
      <div id="footer-wrapper">
        <footer id="colophon" class="cogFooter">
          <?php
          /* footer sidebar */
          if ( ! is_404() ) : ?>
            <div id="footer-widgets">
              <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-4' ); ?>
              <?php endif; ?>
              <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-5' ); ?>
              <?php endif; ?>
              <?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-6' ); ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </footer>
      </div>

      <aside aria-label="FooterScripts"><?php wp_footer(); ?></aside>

    </div>

  </body>
</html>
