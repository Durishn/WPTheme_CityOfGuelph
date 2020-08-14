<?php
/**
 * Template Name: PageAutogen - CommunityGardens
 * The template for displaying automatically generated community garden pages pulled from opendatahub
 * Author: Nic Durish
 *
 */

get_header(); ?>

<div id="main" class="wrapper contentPage">
	<?php if ( function_exists('yoast_breadcrumb') ){yoast_breadcrumb('<div id="top-meta"><p id="breadcrumbs">','</p></div>');} ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">

      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
        <!-- <?php the_content(); ?> -->

        <div class="bs-callout"><p>This page is automatically generated using information from the <a href="http://geodatahub-cityofguelph.opendata.arcgis.com">City of Guelph's GeoDataHub</a></div>
        <?php

        global $wp_query;
        $features_slug = $wp_query->query_vars['features_slug'];

        echo $features_slug;


        $request = wp_remote_get( 'https://maps.guelph.ca/arcgisint/rest/services/Testing/CommunityGardenWebTest/FeatureServer/0/query?where=1%3D1&outFields=Name,GardenType,Description,Address,Directions,AvailablePlots,Accessible,GetInvolved,Email,Ownership,MaintainedBy,GlobalID,CommGardenID,OBJECTID&outSR=4326&f=json' );
        if( is_wp_error( $request ) ) {	return false;}
        $body = wp_remote_retrieve_body( $request );
        $data = json_decode( $body );
        if( ! empty( $data ) ) {
          echo '<ul class="list-unstyled">';
          foreach( $data->features as $feature ) {
            echo '<li>';
              echo '<h2>' . $feature->attributes->Name . '</h2>';
              echo '<h3>Location</h3><p>' . $feature->attributes->Address;
              if ( ! empty($feature->attributes->Directions)){
                echo '   |   ' . $feature->attributes->Directions;
              }
              echo '</p>';
              echo '<h3>About the garden</h3><p>' . $feature->attributes->Description . '</p>';
              echo '<h3>Get involved</h3><p>For more information please email ' . $feature->attributes->Email . '</p>';
            echo '<hr></li>';
          }
          echo '</ul>';
        }
        ?>
      </div>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
