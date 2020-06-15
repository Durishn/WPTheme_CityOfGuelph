<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
* @package WordPress
* @subpackage TwentyTwelve-CityOfGuelph
* @link https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph
*/
?>


        <?php if ( ! is_404() ) : ?>
          <div role="complementary" aria-label="Page Details" id="bottom-meta" style="float: left;">
            <div class="site-feedback">
              <a class="NDprettybtn grey thin fill" style="margin: 0 auto;" href="//forms.guelph.ca/IT/Website-feedback?Q9=https://guelph.ca/?page_id=<?php the_ID(); ?>&Q8=<?php the_title(); ?>">
                <span class="material-icons" style="font-size: 1em; top: 2px; position: relative; margin: 0 6px 0 0; line-height: inherit; border: none; padding: 0;">feedback</span>Report a problem or provide feedback on this page</a>
            </div>
            <div class="post-date">
              <?php if ( ! is_single() ) : ?>
                <?php if (get_the_modified_time() != get_the_time()) : ?>
                  <p>Date updated: <?php the_modified_time('F j, Y'); ?>.</p>
                <?php else: ?>
                  <p>Date posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>. </p>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div> <!-- #main -->

      <!-- <p class="well margin0" aria-label="Website Update Feedback">We’re updating parts of our website. <a href="https://forms.guelph.ca/IT/Website-feedback?Q9=https://guelph.ca/?page_id=<?php the_ID(); ?>&Q8=<?php the_title(); ?>">How can we make it better?</a></p> -->

      <!--==================== FOOTER ====================-->
      <div id="footer-wrapper" aria-hidden="true">
        <footer id="colophon" class="cogFooter">
            <a id="top-return-btn" title="back to top"><span class="sr-only">Back to top</span></a>
            <div id="footer-widgets">
              <!-- <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-4' ); ?>
              <?php endif; ?> -->

              <ul class="footerDirectory list-unstyled colcount-sm-2 colcount-md-3">
                <li><a href="/city-hall/contact-us/">Contact us</a></li>
                <li><a href="/news/social-media/">Social media</a></li>
                <li><a href="/privacy-policy">Privacy policy</a></li>
                <li><a href="/sitemap">Site map</a></li>
                <li><a href="/employment-careers/careers-jobs/">Careers / employment</a></li>
                <li><a href="/news/">Newsroom</a></li>
              </ul>

            </div>
        </footer>
      </div>
    </div>

    <aside aria-hidden="true" aria-label="Footer Scripts"><?php wp_footer(); ?></aside>

  </body>
</html>
