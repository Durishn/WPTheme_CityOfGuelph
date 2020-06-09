<?php
/**
 * Template Name: Page with FAQs
 * The template for displaying pages with structured data faqs
 *

 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

?>
<?php
function mypage_head() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/css/faq-page-template.css">'."\n";
	echo '<script src="'.get_stylesheet_directory_uri().'/js/faq-accordion.js"></script>';
}

add_action('wp_footer', 'mypage_head');
?>
<?php get_header(); ?>


<div id="main" class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php if ( function_exists('yoast_breadcrumb') )
	{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php if (have_rows('faq')) : ?>
<h2>Frequently asked questions</h2>

  <?php while (have_rows('faq')) : the_row(); ?>

    <h3><?php the_sub_field('faq_section_name'); ?></h3>

    <?php if (have_rows('faq_section')): ?>

      <?php while (have_rows('faq_section')): the_row(); ?>
        <button class="accordion"><?php the_sub_field('faq_question'); ?></button>
          <div class="faq-panel">
          <?php the_sub_field('faq_answer'); ?>
          </div>
      <?php endwhile; ?>

  <?php endif; ?>

  <?php endwhile; ?>

  <?php

    $schema = array(
    '@context'   => "https://schema.org",
    '@type'      => "FAQPage",
    'mainEntity' => array()
    );

    global $schema;


    if ( have_rows('faq') ) {

    while ( have_rows('faq') ) : the_row();

      if ( have_rows('faq_section') ) {

        while ( have_rows('faq_section') ) : the_row();

          $questions = array(
            '@type'          => 'Question',
            'name'           => get_sub_field('faq_question'),
            'acceptedAnswer' => array(
            '@type' => "Answer",
            'text' => get_sub_field('faq_answer')
              )
              );

              array_push($schema['mainEntity'], $questions);

        endwhile;

      }

    endwhile;


    function guelphca_generate_faq_schema ($schema) {

      global $schema;

      echo '<script type="application/ld+json">'. json_encode($schema) .'</script>';

    }

    add_action( 'wp_footer', 'guelphca_generate_faq_schema', 100 );


  }

  ?>

<?php endif; ?> <!-- endif have_rows('faq'); -->

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
