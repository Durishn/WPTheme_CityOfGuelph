<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<section id="primary" class="site-content">
<div id="content" role="main">

<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

<header class="archive-header">
				<h1 class="entry-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

<?php

// The Loop
while ( have_posts() ) : the_post(); ?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<small><?php the_time('F j, Y') ?></small>

<div class="entry-content" style="margin-top:10px;">
<?php the_excerpt(); ?>
<hr />
</div>

<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

</div>
</section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>