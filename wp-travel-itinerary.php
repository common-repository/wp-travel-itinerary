<?php
/*
Plugin Name: WP Travel Itinerary
Plugin URI: http://globetrooper.com/notes/wordpress-world-travel-plugin/
Version: 1.1.5
Author: <a href="http://globetrooper.com/">Todd Sullivan</a> of <a href="http://globetrooper.com">Globetrooper</a>
Description: Show your current location and travel schedule (or travel itinerary) in the sidebar of your travel blog. Readers can also propose meetups at each of your future destinations.
*/

define( 'BLOG_DIR', get_bloginfo( 'url' ) );
define( 'PLUGINS_DIR', admin_url( 'plugins.php' ) );
define( 'WIDGETS_DIR', admin_url( 'widgets.php' ) );
define( 'AJAX_DIR', admin_url( 'admin-ajax.php' ) );

define( 'WPTI_DIR', plugin_dir_url( __FILE__ ) );
define( 'WPTI_SETTINGS', admin_url( 'admin.php?page=wpti-settings' ) );
define( 'WPTI_SCHEDULE', admin_url( 'admin.php?page=wpti-schedule' ) );
define( 'WPTI_MEETUPS', admin_url( 'admin.php?page=wpti-meetups' ) );

define( 'GT_HOME', 'http://globetrooper.com' );
define( 'GT_BLOG', 'http://globetrooper.com/notes/' );
define( 'GT_CONTACT', 'http://globetrooper.com/general/contact/' );
define( 'GT_WPTI', 'http://globetrooper.com/notes/wordpress-world-travel-plugin/' );

register_activation_hook( __FILE__,  array( 'WP_Travel_Itinerary', 'wpti_activation' ) );
register_deactivation_hook( __FILE__,  array( 'WP_Travel_Itinerary', 'wpti_deactivation' ) );

if ( ! class_exists( 'WP_Travel_Itinerary' ) ) {

	class WP_Travel_Itinerary extends WP_Widget {
	
		function WP_Travel_Itinerary() {
			
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'WP_Travel_Itinerary' , WPTI_DIR . 'js/main.js' );
			wp_enqueue_style( 'WP_Travel_Itinerary' , WPTI_DIR . 'css/main.css' );
							
			$widget_ops = array( 'classname' => 'wp-travel-itinerary', 'description' => 'Show your current location and travel itinerary in the sidebar. Readers can also propose meetups at each future destination.' );
			$this->WP_Widget( 'WP_Travel_Itinerary', '&nbsp;World Travel', $widget_ops );
			
			WP_Travel_Itinerary::wpti_setup_defaults();
					
		}
		
		function wpti_activation() {
		
			WP_Travel_Itinerary::wpti_setup_defaults();						
		
		}
		
		function wpti_deactivation() {
		
			unregister_widget( 'WP_Travel_Itinerary' );					
		
		}		
		
		function wpti_setup_defaults() {
		
			$options_settings = get_option( 'wpti_settings' );
			if( empty( $options_settings['wpti_introduction'] ) )
				$options_settings['wpti_introduction'] = 'I\'m currently in';
			if( empty( $options_settings['wpti_show_schedule_text'] ) )				
				$options_settings['wpti_show_schedule_text'] = 'View My Travel Itinerary';	
			if( empty( $options_settings['wpti_hide_schedule_text'] ) )	
				$options_settings['wpti_hide_schedule_text'] = 'Hide My Travel Itinerary';			
			if( empty( $options_settings['wpti_lets_meetup_text'] ) )	
				$options_settings['wpti_lets_meetup_text'] = 'Let\'s Meetup Here';
			if( ! is_bool( $options_settings['wpti_hide_schedule'] ) )	
				$options_settings['wpti_hide_schedule'] = true;
			if( ! is_bool( $options_settings['wpti_hide_previous'] ) )	
				$options_settings['wpti_hide_previous'] = true;				
			if( ! is_bool( $options_settings['wpti_meetups_enabled'] ) )	
				$options_settings['wpti_meetups_enabled'] = true;
			if( ! is_bool( $options_settings['wpti_send_email'] ) )	
				$options_settings['wpti_send_email'] = true;
			if( ! is_bool( $options_settings['wpti_meetups_new'] ) )	
				$options_settings['wpti_meetups_new'] = false;
				
			update_option( 'wpti_settings', $options_settings );
			
			$options_schedule = get_option( 'wpti_schedule', false );
			if( empty( $options_schedule ) ) {
		
				$new_leg = array();
				$new_leg['wpti_from_date'] = mktime( 12, 0, 0, 1, 1, date( 'Y' ) );
				$new_leg['wpti_to_date'] = mktime( 12, 0, 0, 1, 1, date( 'Y' ) + 1 );
				$new_leg['wpti_place'] = 'Test Location';
				$new_leg['wpti_country_code'] = 'AU';
				$new_leg['wpti_country_name'] = 'Australia';
				
				$options_schedule['leg_' . date( 'U' )] = $new_leg;
									
				update_option( 'wpti_schedule', $options_schedule );
			
			}
			
			$options_meetup = get_option( 'wpti_meetups', false );
			if( empty( $options_meetup ) ) {
			
				$today = date( 'U' );
				
				$new_meetup = array();
				$new_meetup['wpti_date'] = $today;
				$new_meetup['wpti_location'] = 'Sydney, Australia';
				$new_meetup['wpti_name'] = 'Todd and Lauren';
				$new_meetup['wpti_email'] = 'team@globetrooper.com';
				$new_meetup['wpti_message'] = 'Test Meetup: although we really would love to catch up and show you around town. See our itinerary on the Globetrooper blog.';
				
				$options_meetup['meetup_' . $today . '_team@globetrooper.com'] = $new_meetup;
				
				update_option( 'wpti_meetups', $options_meetup );
			
			}
		
		}		
		
		function form( $instance ) {
		
			$instance = wp_parse_args( (array) $instance, array( 'title' => 'Current Location' ) );
			$title = strip_tags( $instance['title'] );
			
			?>
			
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>">
						Title: <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo attribute_escape( $title ); ?>" />
					</label>
				</p>			
			
			<?php
			
		}
	  
		function update( $new_instance, $old_instance ) {
		
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'] != '' ? strip_tags( $new_instance['title'] ) : 'Current Location';
			
			return $instance;
			
		}
 
		function widget( $args, $instance ) {

			extract( $args, EXTR_SKIP );
			
			echo $before_widget;
			
			$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
			
			$options = get_option( 'wpti_schedule' );
			$settings = get_option( 'wpti_settings' );
			
			$legs = array();
			$locations = array();
			$current_location = '';
			
			array_multisort( $options, SORT_ASC );
			
			if( ! empty( $options ) ) {
			
				foreach( $options as $leg ) {
					
					if ( $settings['wpti_hide_previous'] == false || ($settings['wpti_hide_previous'] == true && $leg['wpti_to_date'] > date( 'U' )) ) { 
					
						if ( empty( $leg['wpti_place'] ) ) {
						
							$location = $leg['wpti_country_name'];
							
						} else {
						
							$location = $leg['wpti_place'] . ', ' . $leg['wpti_country_name'];
							
						}
						
						if ( $leg['wpti_from_date'] < date( 'U' ) ) { 
							$current_location = $location;
						}
						
						$legs[] = $leg;
						$locations[] = $location;
						
					}
					
				}
							
			} 
			
			require_once 'inc/widget.php';
	  	
			echo $after_widget;
			
		}
		
		function wpti_meetup_process() {
			
			$options = get_option( 'wpti_meetups' );
			$today = date( 'U' );
			
			$new_meetup = array();
			$new_meetup['wpti_date'] = $today;
			$new_meetup['wpti_location'] = $_POST['wpti_location'];
			$new_meetup['wpti_name'] = $_POST['wpti_name'];
			$new_meetup['wpti_email'] = $_POST['wpti_email'];
			$new_meetup['wpti_message'] = $_POST['wpti_message'];
			
			$options['meetup_' . $today . '_' . $_POST['wpti_email']] = $new_meetup;
			
			update_option( 'wpti_meetups', $options );			
			
			WP_Travel_Itinerary::wpti_meetups_new( true );
			
			$options_settings = get_option( 'wpti_settings' );
			
			global $wpdb;
			
			if( $options_settings['wpti_send_email'] == true ) {
			
				$recipient = get_option( 'blogname' ) . " <" . get_option( 'admin_email' ) . ">";
				$subject = "Meetup Proposal from " . $_POST['wpti_name'];
				
				/* Must use double quotes for newline to work. */
				$message = "This is a Meetup Proposal from the Globetrooper WP World Travel Plugin.\n\n";
				$message .= "From Name: " . $_POST['wpti_name'] . "\n";
				$message .= "From Email: " . $_POST['wpti_email'] . "\n\n";
				$message .= "Location: " . $_POST['wpti_location'] . "\n";
				$message .= "Proposed Meetup: " . $_POST['wpti_message'] . "\n\n";
				$message .= "Group Trips: http://globetrooper.com/" . str_replace( ' ', '-', trim( strtolower(  substr( $_POST['wpti_location'], - ( strlen( $_POST['wpti_location'] ) - strpos( $_POST['wpti_location'], ',' ) - 1 ) ) ) ) ) . "\n";
				
				$sitename = strtolower( $_SERVER['SERVER_NAME'] );
				
				if ( substr( $sitename, 0, 4 ) == 'www.' ) {
					
					$sitename = substr( $sitename, 4 );
				
				}
				
				$from_email = 'wordpress@' . $sitename;	
				
				$from_email = 'test@globetrooper.com';
				
				$header = "";
				$header .= "From: " . $_POST['wpti_name'] . " <" . $from_email . ">\n";
				$header .= "Reply-To: " . $_POST['wpti_email'] . "\n";
				$header .= "Content-type: text/plain; charset=" . get_option( 'blog_charset' );
				$header .= "Return-Path: " . $from_email . "\n";
				
				@wp_mail( $recipient, $subject, $message, $header );
			
			}
			
		  echo 'success';  	  

		}  	

		function wpti_admin_settings() {
		
			$options = get_option( 'wpti_settings' );
		
			require_once 'inc/admin-settings.php';
		
		}
	  
		function wpti_admin_settings_process( $input ) {
			
			if( isset( $_POST['wpti-admin-submit'] ) ) {
			
				$options = get_option( 'wpti_settings' );
				$options['wpti_introduction'] = trim( $input['wpti-introduction'] );
				$options['wpti_show_schedule_text'] = $input['wpti-show-schedule-text'];
				$options['wpti_hide_schedule_text'] = $input['wpti-hide-schedule-text'];
				$options['wpti_lets_meetup_text'] = $input['wpti-lets-meetup-text'];
				$options['wpti_hide_schedule'] = (bool)$input['wpti-hide-schedule'];
				$options['wpti_hide_previous'] = (bool)$input['wpti-hide-previous'];				
				$options['wpti_meetups_enabled'] = (bool)$input['wpti-meetups-enabled'];
				$options['wpti_send_email'] = (bool)$input['wpti-send-email'];
				
				return $options;
				
			} else {		
			
				return $input;
				
			}			
		
		} 	  
	  
		function wpti_admin_schedule() {
		
			global $wp_locale;
			$options = get_option( 'wpti_schedule' );
		
			require_once 'inc/admin-schedule.php';
		
		}
	  
		function wpti_admin_schedule_process( $input ){
			
			$options = get_option( 'wpti_schedule' );
			
			if( isset( $_POST['wpti-delete'] ) ) {
				
				unset( $options[$_POST['wpti-delete']] );
				
			} else {
				
				$from_year = is_numeric( $input['wpti-from-year'] ) ? $input['wpti-from-year'] : date( 'Y' );
				$from_day = is_numeric( $input['wpti-from-day'] ) ? $input['wpti-from-day'] : 1;
				$to_year = is_numeric( $input['wpti-to-year'] ) ? $input['wpti-to-year'] : date( 'Y' ) + 1;
				$to_day = is_numeric( $input['wpti-to-day'] ) ? $input['wpti-to-day'] : 1;
				
				$new_leg = array();
				$new_leg['wpti_from_date'] = mktime( 12, 0, 0, $input['wpti-from-month'], $from_day, $from_year );
				$new_leg['wpti_to_date'] = mktime( 12, 0, 0, $input['wpti-to-month'], $to_day, $to_year );
				$new_leg['wpti_place'] = $input['wpti-place'];
				$new_leg['wpti_country_code'] = substr( $input['wpti-country'], 0, 2 );
				$new_leg['wpti_country_name'] = substr( $input['wpti-country'], - ( strlen( $input['wpti-country'] ) - 3 ) );
				
				$options['leg_' . date( 'U', $new_leg['wpti_from_date'])] = $new_leg;
				
			}
			
			return $options;
		
		}
		
		function wpti_admin_meetups() {
		
			global $wp_locale;
			$options = get_option( 'wpti_meetups' );
		
			require_once 'inc/admin-meetups.php';
		
		} 

		function wpti_admin_meetups_process( $input ){
		
			if( isset( $_POST['wpti-delete'] ) ) {
			
				$options = get_option( 'wpti_meetups' );
				unset( $options[$_POST['wpti-delete']] );
				
				return $options;			
				
			} else {		
			
				return $input;
				
			}
		
		}
		
		function wpti_meetups_new( $status = null ) {
		
			$options_settings = get_option( 'wpti_settings' );
			
			if( isset( $status ) ) {

				$options_settings['wpti_meetups_new'] = $status;
				update_option( 'wpti_settings', $options_settings );
			
			} else {
			
				return $options_settings['wpti_meetups_new'];
			
			}			
		
		}
		
		function wpti_meetups_alert() {
			
			if ( WP_Travel_Itinerary::wpti_meetups_new() && ! preg_match( '/wpti-meetups/i', strtolower( $_SERVER["REQUEST_URI"] ) ) ) {			
			
				require_once 'inc/meetups-new.php';
			
			} else {
			
				WP_Travel_Itinerary::wpti_meetups_new( false );
			
			}
		
		}			    
		
		function wpti_admin_menu() {
		
			add_menu_page( 'Globetrooper', 'Globetrooper', 'manage_options', 'wpti-settings', '' );
			add_submenu_page( 'wpti-settings', 'Manage Settings', 'Settings', 'manage_options', 'wpti-settings', array( 'WP_Travel_Itinerary', 'wpti_admin_settings' ) );
			add_submenu_page( 'wpti-settings', 'Manage Schedule', 'Schedule', 'manage_options', 'wpti-schedule', array( 'WP_Travel_Itinerary', 'wpti_admin_schedule' ) );
			add_submenu_page( 'wpti-settings', 'Manage Meetups', 'Meetups', 'manage_options', 'wpti-meetups', array( 'WP_Travel_Itinerary', 'wpti_admin_meetups' ) );
			
		}

		function wpti_load_options() {

		  register_setting( 'wpti_settings', 'wpti_settings', array( 'WP_Travel_Itinerary', 'wpti_admin_settings_process' ) );
		  register_setting( 'wpti_schedule', 'wpti_schedule', array( 'WP_Travel_Itinerary', 'wpti_admin_schedule_process' ) );
		  register_setting( 'wpti_meetups', 'wpti_meetups', array( 'WP_Travel_Itinerary', 'wpti_admin_meetups_process' ) );

		}
		
		function wpti_load_widget() {
	  
			register_widget( 'WP_Travel_Itinerary' );
		
		}	
	  	
	}

	/* Ajax actions to process meetup form in widget. */
	add_action( 'wp_ajax_wpti_meetup_process', array( 'WP_Travel_Itinerary', 'wpti_meetup_process' ) );
	add_action( 'wp_ajax_nopriv_wpti_meetup_process', array( 'WP_Travel_Itinerary', 'wpti_meetup_process' ) );
		
	/* Admin actions for entire plugin. */
	add_action( 'admin_menu', array( 'WP_Travel_Itinerary', 'wpti_admin_menu' ) );
	add_action( 'admin_init', array( 'WP_Travel_Itinerary', 'wpti_load_options' ) );
	add_action( 'widgets_init', array( 'WP_Travel_Itinerary', 'wpti_load_widget' ) );

	/* Admin panel alert for new meetups, in case email isn't working. */
	add_action( 'admin_notices', array( 'WP_Travel_Itinerary', 'wpti_meetups_alert' ) );
}

?>