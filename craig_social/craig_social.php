<?php
/*
Plugin Name: Craig Social
Plugin URI: https://craigphares.com/plugins/craigsocial
Description: Adds social links to your site.
Version: 1.0
Author: Craig Phares
Author URI: https://craigphares.com/
License: MIT
*/

class Craig_Social extends WP_Widget {

    public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_craig_social',
			'description' => 'A list of social links.',
		);
		parent::__construct( 'craig_social', 'Craig Social', $widget_ops );
	}

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
        <ul>
        <?php
        $twitter = $instance['twitter'];
        if ( ! empty( $twitter ) ) {
            ?>
            <li><i class="fab fa-twitter"></i> <a href="https://twitter.com/<?php echo $twitter; ?>">twitter.com/<?php echo $twitter; ?></a></li>
            <?php
		}
		$dribbble = $instance['dribbble'];
        if ( ! empty( $dribbble ) ) {
            ?>
            <li><i class="fab fa-dribbble"></i> <a href="https://dribbble.com/<?php echo $dribbble; ?>">dribbble.com/<?php echo $dribbble; ?></a></li>
            <?php
		}
		$github = $instance['github'];
        if ( ! empty( $github ) ) {
            ?>
            <li><i class="fab fa-github"></i> <a href="https://github.com/<?php echo $github; ?>">github.com/<?php echo $github; ?></a></li>
            <?php
        }
        ?>
        </ul>
        <?php
		echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Social', 'craigphares' );
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <?php
		$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'Twitter:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
		</p>
		<?php
		$dribbble = ! empty( $instance['dribbble'] ) ? $instance['dribbble'] : '';
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php esc_attr_e( 'Dribbble:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>">
		</p>
		<?php
		$github = ! empty( $instance['github'] ) ? $instance['github'] : '';
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>"><?php esc_attr_e( 'GitHub:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" type="text" value="<?php echo esc_attr( $github ); ?>">
		</p>
		<?php 
    }
    
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? sanitize_text_field( $new_instance['dribbble'] ) : '';
		$instance['github'] = ( ! empty( $new_instance['github'] ) ) ? sanitize_text_field( $new_instance['github'] ) : '';
		return $instance;
	}

}

function register_craig_social() {
    register_widget( 'Craig_Social' );
}
add_action( 'widgets_init', 'register_craig_social' );