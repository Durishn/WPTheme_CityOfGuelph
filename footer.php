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

<!--</div>-->
<?php if (get_the_modified_time() != get_the_time()) : ?>
  <p class="post-date">Last Updated: <?php the_modified_time('F j, Y'); ?>.</p>
  <p class="well">We’re updating parts of our website. <a href="https://forms.guelph.ca/IT/Website-feedback?Q9=https://guelph.ca/?page_id=<?php the_ID(); ?>&Q8=<?php the_title(); ?>">How can we make it better?</a></p>
<?php else: ?>
  <p>Posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>. </p>
  <p class="well">We’re updating parts of our website. <a href="https://forms.guelph.ca/IT/Website-feedback?Q9=https://guelph.ca/?page_id=<?php the_ID(); ?>&Q8=<?php the_title(); ?>">How can we make it better?</a></p>
<?php endif; ?>
</div>

</div>

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

    <div>

    </div>

  </footer>

</div>

<aside aria-label="FooterWidgets"><?php wp_footer(); ?></aside>

<!-- Twitter universal website tag code
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','o013y');
twq('track','PageView');
</script>
 End Twitter universal website tag code -->

</body>

</html>
