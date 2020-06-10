<?php
/**
 * The template for displaying the Sitemap page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 *
 * Template Name: Sitemap Page
 */

get_header(); ?>

<div id="main" class="wrapper sitemapPage">
  <?php if ( function_exists('yoast_breadcrumb') )
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
      <div class="entry-header">
  			<h1 class="entry-title">Site map</h1>
		  </div>
      <div class="entry-content">
  			<?php while ( have_posts() ) : the_post(); ?>
          <ul class="sitemap">
          <?php
          $html = wp_list_pages(
            array(
              'exclude' => '9, 87037', // enter the ID or comma-separated list of page IDs to exclude
              'child_of' => '0',
              'title_li' => '',
              'depth' => '2',
              'sort_column' => 'menu_order'
            )
          );

          ?>
          </ul>
  			<?php endwhile; // end of the loop. ?>
      </div>
		</div><!-- #content -->
	</div><!-- #primary -->
  <?php get_sidebar(); ?>
  <?php get_footer(); ?>
