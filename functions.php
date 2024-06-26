<?php

    // Note :: tutorial -> https://www.hostinger.co.uk/tutorials/how-to-create-custom-widget-in-wordpress

    class calendar_widget extends WP_Widget {

        function __construct() {
            parent::__construct(
            // widget ID
            'calendar_widget',
            // widget name
            __('Liturgical Calendar Widget', 'calendar_widget_domain'),
            // widget description
            array ( 'description' => __( 'Display liturgical calendar information', 'calendar_widget_domain' ), )
            );
        }

        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
            echo $args['before widget'];
            //if title is present
            If ( ! empty ( $title ) )
                Echo $args['before_title'] . $title . $args['after_title'];
            //output
            echo __( 'Greetings from Liturgical!', 'calendar_widget_domain' );
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) )
                $title = $instance[ 'title' ];
            else
                $title = __( 'Default Title', 'calendar_widget_domain');
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                    <?php _e( 'Title:' ); ?></label>
                    <input class="widefat"
                           id="<?php echo $this->get_field_id( 'title' ); ?>"
                           name="<?php echo $this->get_field_name( 'title' ); ?>"
                           type="text"
                           value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }

    }
