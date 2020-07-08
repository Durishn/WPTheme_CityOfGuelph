<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div id="main" class="wrapper contentPage">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! This link appears to be broken.', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p>
						<?php _e( 'We&rsquo;re updating the website’s content and we may have moved that page. Please try the site search, or the popular pages listed below. <br /><br /><a href="/how-can-we-help-you/">How can we help you?</a>', 'twentytwelve' ); ?>
					</p>

					<h2>Popular pages</h2>
					<ul>
						<li><a href="/?page_id=2442">Bids and tenders</a></li>
						<li><a href="/employment-careers/">Careers</a></li>
						<li><a href="/city-hall/mayor-and-council/city-council/">City Council</a></li>
						<li><a href="/events">Events calendar</a></li>
						<li><a href="/living/garbage-and-recycling/">Garbage and recycling</a></li>
						<li><a href="/living/getting-around/bus">Guelph Transit</a></li>
						<li><a href="/living/getting-around/drive/parking/">Parking</a></li>
						<li><a href="/living/recreation/">Recreation</a></li>

					</ul>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
