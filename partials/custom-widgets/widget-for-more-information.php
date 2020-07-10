<?php

/**
 * A custom ACF widget.
 */
class FMI_Custom_Widget extends WP_Widget {

    /**
    * Register widget with WordPress.
    */
    function __construct() {
        parent::__construct(
            'fmi_custom_widget', // Base ID
            __('For more information widget', 'text_domain'), // Name
            array( 'description' => __( 'Custom: displays "for more information content" as widget', 'text_domain' ), 'classname' => 'fmi-custom-widget' ) // Args
        );
    }

    /**
    * Front-end display of widget.
    *
    * @see WP_Widget::widget()
    *
    * @param array $args     Widget arguments.
    * @param array $instance Saved values from database.
    */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( !empty($instance['title']) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        echo get_field('title', 'widget_' . $args['widget_id']);?>

        <?php if ( get_post_meta( get_the_ID(), 'contact_visibility', true ) == 1) : ?>
          <div class="custom-sidebar-content well">
            <h3>For more information</h3>
            <p style="padding-left:2px"><strong><?php if (get_field('contact_name')):the_field('contact_name');endif;
            if (get_field('contact_name') && get_field('contact_position')): echo ' | ';endif;
            if (get_field('contact_position')):the_field('contact_position');endif;?> </strong><?php
            if (get_field('contact_name') || get_field('contact_position')): echo '<br />';endif;
            if (get_field('contact_department')):the_field('contact_department');echo '<br />';endif;
            if (get_field('contact_organization')):the_field('contact_organization');echo '<br />';endif;
            if (get_field('contact_organization_address')):the_field('contact_organization_address');echo '<br />';endif;
            if (get_field('contact_phone')):the_field('contact_phone');endif;if (get_field('contact_extension')): echo " extension "; the_field('contact_extension'); echo "<br />";endif;
            if (get_field('contact_email')): echo '<a href="mailto:'; the_field('contact_email'); echo '">'; the_field('contact_email'); echo '</a>';endif;
          echo '</p></div>';
        endif;

        echo $args['after_widget'];
    }

    /**
    * Back-end widget form.
    *
    * @see WP_Widget::form()
    *
    * @param array $instance Previously saved values from database.
    */
    public function form( $instance ) {
        if ( isset($instance['title']) ) {
            $title = $instance['title'];
        }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
    }

    /**
    * Sanitize widget form values as they are saved.
    *
    * @see WP_Widget::update()
    *
    * @param array $new_instance Values just sent to be saved.
    * @param array $old_instance Previously saved values from database.
    *
    * @return array Updated safe values to be saved.
    */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

}

// register FMI_Custom_Widget widget
add_action( 'widgets_init', function(){
  register_widget( 'FMI_Custom_Widget' );
});
