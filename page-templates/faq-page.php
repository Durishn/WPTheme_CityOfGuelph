<?php
/**
 * Template Name: Page - FAQ
 * The template for displaying pages with structured data faqs
 *
 */

get_header(); ?>

<div id="main" class="wrapper contentPage faqpage">
  <?php if ( function_exists('yoast_breadcrumb') ){yoast_breadcrumb('<div id="top-meta"><p id="breadcrumbs">','</p></div>');} ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			     <?php get_template_part( 'partials/template-parts/content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

      <?php $schema = array(
      '@context'   => "https://schema.org",
      '@type'      => "FAQPage",
      'mainEntity' => array()
      );
      global $schema; ?>

      <?php if (have_rows('faq')) : ?>
        <?php while (have_rows('faq')) : the_row(); ?>
          <h3><?php the_sub_field('faq_section_name'); ?></h3>
          <?php if (have_rows('faq_section')): ?>
            <?php while (have_rows('faq_section')): the_row(); ?>
              <button class="accordion"><?php the_sub_field('faq_question'); ?></button>
              <div class="accordian-panel">
                <?php the_sub_field('faq_answer'); ?>
              </div>

              <?php $questions = array(
                '@type'          => 'Question',
                'name'           => get_sub_field('faq_question'),
                'acceptedAnswer' => array(
                '@type' => "Answer",
                'text' => get_sub_field('faq_answer')
                  )
                  );

                  array_push($schema['mainEntity'], $questions); ?>

            <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile;


        function guelphca_generate_faq_schema ($schema) {
          global $schema;
          echo '<script type="application/ld+json">'. json_encode($schema) .'</script>';
        }
        add_action( 'wp_footer', 'guelphca_generate_faq_schema', 100 );

      endif; ?> <!-- endif have_rows('faq'); -->
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
