<?php if ( get_post_meta( get_the_ID(), 'contact_visibility', true ) == 1) : ?>
  <?php if( have_rows('contact_information_repeater') ): ?>
    <div class="custom-sidebar-content well">
      <h3>For more information</h3>

        <?php $loopflag = FALSE;?>
        <?php while( have_rows('contact_information_repeater') ): the_row(); ?>

          <?php if($loopflag): echo '<hr>'; endif;?>

          <p style="padding-left:2px">
            <strong><?php if (get_sub_field('contact_name')):the_sub_field('contact_name');endif;
            if (get_sub_field('contact_name') && get_sub_field('contact_position')): echo ' | ';endif;
            if (get_sub_field('contact_position')):the_sub_field('contact_position');endif;?> </strong><?php
            if (get_sub_field('contact_name') || get_sub_field('contact_position')): echo '<br />';endif;
            if (get_sub_field('contact_department')):the_sub_field('contact_department');echo '<br />';endif;
            if (get_sub_field('contact_organization')):the_sub_field('contact_organization');echo '<br />';endif;
            if (get_sub_field('contact_organization_address')):the_sub_field('contact_organization_address');echo '<br />';endif;
            if (get_sub_field('contact_phone')):the_sub_field('contact_phone'); if (get_sub_field('contact_extension')): echo " extension "; the_sub_field('contact_extension'); endif; echo "<br />";endif;
            if (get_sub_field('contact_email')): echo '<a href="mailto:'; the_sub_field('contact_email'); echo '">'; the_sub_field('contact_email'); echo '</a><br>';endif;?>
          </p>
          <?php $loopflag = TRUE;?>
        <?php endwhile; ?>

    </div>

  <!-- FOR BACKWARDS COMPATIBILITY WITH OLD ACF (NON-REPEATER) -->
  <?php elseif (get_field('contact_name') || get_field('contact_phone') || get_field('contact_email')): ?>
    <div class="custom-sidebar-content well">
      <h3>For more information</h3>
      <p style="padding-left:2px">
        <strong><?php if (get_field('contact_name')):the_field('contact_name');endif;
        if (get_field('contact_name') && get_field('contact_position')): echo ' | ';endif;
        if (get_field('contact_position')):the_field('contact_position');endif;?> </strong><?php
        if (get_field('contact_name') || get_field('contact_position')): echo '<br />';endif;
        if (get_field('contact_department')):the_field('contact_department');echo '<br />';endif;
        if (get_field('contact_organization')):the_field('contact_organization');echo '<br />';endif;
        if (get_field('contact_organization_address')):the_field('contact_organization_address');echo '<br />';endif;
        if (get_field('contact_phone')):the_field('contact_phone');endif;if (get_field('contact_extension')): echo " extension "; the_field('contact_extension'); echo "<br />";endif;
        if (get_field('contact_email')): echo '<a href="mailto:'; the_field('contact_email'); echo '">'; the_field('contact_email'); echo '</a><br>';endif;?>
      </p>
    </div>
  <?php endif; ?>
<?php endif;?>
