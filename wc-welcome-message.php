<?php
/*
Plugin Name: WooCommerce Welcome Message
Version: 1.0
Description: Display a personalized message to greet your WooCommerce store guests and returning customers.
Author: Designs 4 The Web
Author URI: http://designs4theweb.com
Text Domain: wc-welcome-message
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { // Check to see that WooCommerce is installed and active

add_filter( 'woocommerce_general_settings', 'wc_welcome_message_settings' );

function wc_welcome_message_settings( $settings ) {

	$settings[] = array(
		
		'title' => __( 'WC Welcome Message', 'wc-welcome-message' ),
		'type' => 'title',
		'desc' => 'Settings for WC Welcome Message',
		'id' => 'wc_welcome_message_section'
		);
					
	$settings[] = array(

        'name'     => __( 'Repeat Customer Message', 'wc-welcome-message' ),
        'desc_tip' => __( 'The message to be displayed to returning customers.', 'wc-welcome-message' ),
        'id'       => 'repeat_customer_message',
        'type'     => 'text',
		'css'      => 'min-width: 350px;',
        'desc'     => __( 'Thanks for shopping with us!', 'wc-welcome-message' ),
		);

		$settings[] = array(

        'name'     => __( 'Guest Message', 'wc-welcome-message' ),
        'desc_tip' => __( 'The message to be displayed to guest visitors.', 'wc-welcome-message' ),
        'id'       => 'guest_message',
        'type'     => 'text',
		'css'      => 'min-width: 350px;',
        'desc'     => __( 'I hope you enjoy your visit!', 'wc-welcome-message' ),
		);
	
		$settings[] = array(
		
		'type' => 'sectionend',
		'id' => 'wc_welcome_message_section'
		);

	return $settings;

}

function wc_welcome_message () {

// Set the variables

$current_user = wp_get_current_user(); // Get the current user's info
$repeat_customer_message = get_option( 'repeat_customer_message' ); // Message to be used for repeat customers
if ( ( ! $repeat_customer_message ) ) { // Create a default message for returning users if the field is left blank
$repeat_customer_message = __( 'Thank you for shopping with us!', 'wc-welcome-message' );
}
$guest_message = get_option( 'guest_message' );  // Message to be used for guests
if ( ( ! $guest_message ) ) { // Create a default message for guests if the field is left blank
$guest_message = __( 'Thank you for stopping by our store!', 'wc-welcome-message' );
}
$account_page_url = get_permalink( get_option('woocommerce_myaccount_page_id') ); // Get the url of the my account page
$repeat_msg_fn = sprintf(
    __( '<p id = "wc-welcome-message">Welcome back <span style = "font-weight: bold;"> %1$s</span>! %2$s</p>', 'wc-welcome-message' ), $current_user->user_firstname, $repeat_customer_message);
$repeat_msg_nn = sprintf(
    __( '<p id = "wc-welcome-message">Welcome back <span style = "font-weight: bold;"> %1$s</span>! %2$s</p>', 'wc-welcome-message' ), $current_user->nickname, $repeat_customer_message);
$guest_msg = sprintf(
    __( '<p id = "wc-welcome-message">Welcome, <span style = "font-weight: bold;">guest</span>! %1$s</p><p>Click <a href = "%2$s">here</a> to create an account or login.</p>', 'wc-welcome-message' ), $guest_message, $account_page_url);

// Create the messages
	
if ( is_user_logged_in () &&  ( $current_user->user_firstname ) ) { // This will run if a user is logged in and has a first name in their profile
return $repeat_msg_fn; // Return the message
}

elseif ( is_user_logged_in () &&  ( ! $current_user->user_firstname ) ) { // This will run if a user is logged in without a first name in their profile
return $repeat_msg_nn; // Return the message
}

else { // This will run for anyone not logged in
return $guest_msg;  // This will run for guest users
}

}

// Add the shortcode
add_shortcode('wc_welcome_message', 'wc_welcome_message');

}

?>