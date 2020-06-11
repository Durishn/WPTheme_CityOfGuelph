<?php
/**
 * Template Name: Sitemap Page
 * The template for displaying the Sitemap page
 *
 */

get_header(); ?>

<div id="main" class="wrapper sitemapPage">
  <?php if ( function_exists('yoast_breadcrumb') ){yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
	<div id="primary">
		<div id="content" role="main">
      <div class="entry-header">
  			<h1 class="entry-title">Site map</h1>
		  </div>
      <div class="entry-content">
  			<?php while ( have_posts() ) : the_post(); ?>
          <ul class="sitemap">
          <?php
          $exclude = [];
          foreach (get_pages(['meta_key' => '_wp_page_template', 'meta_value' => 'page-custom-example.php']) as $page) { // remove pages with certain templates
            $exclude[] = $page->post_id;
          }

          /* LIST EXPLICIT EXCLUSIONS HERE*/
          $exclude = array_merge($exclude, ['9, 87037']);

          $html = wp_list_pages(
            array(
              'exclude' => implode(",", $exclude),
              'child_of' => '0',
              'title_li' => '',
              'depth' => '2',
              'sort_column' => 'menu_order',
              'has_password'   => FALSE
            )
          );

          ?>
          </ul>
  			<?php endwhile; ?>
      </div>
		</div><!-- #content -->
	</div><!-- #primary -->
  <?php get_footer(); ?>