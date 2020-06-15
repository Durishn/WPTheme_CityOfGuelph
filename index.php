<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage TwentyTwelve-CityOfGuelph
 * @link https://github.com/Guelph-Digital-Service/TwentyTwelve-CityOfGuelph
 */



get_header(); ?>

<div id="main" class="wrapper">
	<div id="primary">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); get_template_part( 'content', 'page' ); endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>
