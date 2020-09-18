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

        <!--==================== PAGE BOTTOM META ====================-->
        <?php if ( ! is_404() ) : ?>
          <div role="complementary" aria-label="Page Details" id="bottom-meta">
            <div class="site-feedback">
              <a class="NDprettybtn link-feedback" style="margin: 0 auto;" href="//forms.guelph.ca/IT/Website-feedback?Q9=https://guelph.ca/?page_id=<?php the_ID(); ?>&Q8=<?php the_title(); ?>">Report a problem or provide feedback on this page</a>
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

      <!--==================== FOOTER ====================-->
      <footer id="footer-wrapper" aria-hidden="true">
        <div id="colophon" class="cogFooter">
            <a id="top-return-btn" title="back to top"><span class="sr-only">Back to top</span></a>
            <div id="footer-widgets">
              <!-- <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-4' ); ?>
              <?php endif; ?> -->

              <div class="row">
                <div class="col-sm-3">
                    <div class="footaddress">
                      <p><strong>Guelph City Hall</strong><br>1 Carden Street<br>Guelph, ON<br>N1H 3A1<br>519-822-1260<br>TTY 519-826-9771<br>
                      <a style="color:white; " href="mailto:info@guelph.ca">info@guelph.ca</a></p>
                    </div>
                </div>
                <div class="col-sm-9 footerDirectoryWrapper">
                  <div class="footerDirectory">
                    <ul class="list-unstyled colcount-sm-2 colcount-md-2">
                      <li><a href="/city-hall/contact-us/">Contact us</a></li>
                      <li><a href="/news/social-media/">Social media</a></li>
                      <li><a href="/city-hall/access-to-information/privacy-policy/">Privacy policy</a></li>
                      <li><a href="/sitemap">Site map</a></li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
        </div>
      </footer>
    </div>

    <aside aria-hidden="true" aria-label="Footer Scripts"><?php wp_footer(); ?></aside>

  </body>
</html>
