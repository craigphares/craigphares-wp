<?php
/*
Plugin Name: Craig Newsletter
Plugin URI: https://craigphares.com/plugins/craignewsletter
Description: Adds a Mailchimp signup form to your site.
Version: 1.0
Author: Craig Phares
Author URI: https://craigphares.com/
License: MIT
*/

class Craig_Newsletter extends WP_Widget {

    public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_craig_newsletter',
			'description' => 'A Mailchimp signup form.',
		);
		parent::__construct( 'craig_newsletter', 'Craig Newsletter', $widget_ops );
	}

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
        <?php
        $intro = $instance['intro'];
        if ( ! empty( $intro ) ) {
            ?>
            <div class="widget_craig_newsletter__intro"><?php echo $intro; ?></div>
            <?php
		}
        $user_id = $instance['user_id'];
        $form_id = $instance['form_id'];
        $email = $instance['email'];
        $subscribe = $instance['subscribe'];
        ?>
        <!-- Begin Mailchimp Signup Form -->
        <div id="mc_embed_signup">
            <form action="https://sixoverground.us6.list-manage.com/subscribe/post?u=<?php echo $user_id; ?>&amp;id=<?php echo $form_id; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <div class="mc-field-group">
                        <label for="mce-EMAIL"><?php echo $email; ?></label>
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="<?php echo $email; ?>">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_<?php echo $user_id; ?>_<?php echo $form_id; ?>" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="<?php echo $subscribe; ?>" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
        </div>
        <!--End mc_embed_signup-->
        <?php
		echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Newsletter', 'craigphares' );
        ?>
        <p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
		$intro = ! empty( $instance['intro'] ) ? $instance['intro'] : '';
		?>
        <p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>"><?php esc_attr_e( 'Intro:', 'craigphares' ); ?></label> 
		    <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'intro' ) ); ?>"><?php echo esc_attr( $intro ); ?></textarea>
		</p>
        <?php
		$user_id = ! empty( $instance['user_id'] ) ? $instance['user_id'] : '';
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>"><?php esc_attr_e( 'User ID:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'user_id' ) ); ?>" type="text" value="<?php echo esc_attr( $user_id ); ?>">
		</p>
		<?php
		$form_id = ! empty( $instance['form_id'] ) ? $instance['form_id'] : '';
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'form_id' ) ); ?>"><?php esc_attr_e( 'Form ID:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'form_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'form_id' ) ); ?>" type="text" value="<?php echo esc_attr( $form_id ); ?>">
        </p>
        <?php
		$email = ! empty( $instance['email'] ) ? $instance['email'] : esc_html__( 'Email Address', 'craigphares' );
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email Prompt:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
        </p>
        <?php
		$subscribe = ! empty( $instance['subscribe'] ) ? $instance['subscribe'] : esc_html__( 'Subscribe', 'craigphares' );
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'subscribe' ) ); ?>"><?php esc_attr_e( 'Subscribe Button:', 'craigphares' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subscribe' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subscribe' ) ); ?>" type="text" value="<?php echo esc_attr( $subscribe ); ?>">
		</p>
		<?php 
    }
    
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['intro'] = ( ! empty( $new_instance['intro'] ) ) ? sanitize_text_field( $new_instance['intro'] ) : '';
		$instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ) ? sanitize_text_field( $new_instance['user_id'] ) : '';
		$instance['form_id'] = ( ! empty( $new_instance['form_id'] ) ) ? sanitize_text_field( $new_instance['form_id'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_text_field( $new_instance['email'] ) : '';
		$instance['subscribe'] = ( ! empty( $new_instance['subscribe'] ) ) ? sanitize_text_field( $new_instance['subscribe'] ) : '';
		return $instance;
	}

}

function register_craig_newsletter() {
    register_widget( 'Craig_Newsletter' );
}
add_action( 'widgets_init', 'register_craig_newsletter' );