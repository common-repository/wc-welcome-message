=== WC Welcome Message ===
Contributors: Mike_Oberdick
Tags: woocommerce, e-commerce, store, welcome message, customer message, welcome customer, woocommerce message
Requires at least: 3.5
Tested up to: 4.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display a personalized message to greet your WooCommerce store guests and returning customers.

== Description ==

WC Welcome Message allows you to personally interact with your WooCommerce store visitors.  Included with this plugin are two new fields in the WooCommerce general settings section which allow you to create unique personalized messages for both returning customers and guests.  These messages are then easy to include in your posts, pages, and widgets using a shortcode.

== Installation ==

1. Upload `wc-welcome-message` to the `/wp-content/plugins/wc-welcome-message` directory or install the plugin through the WordPress plugins screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Create your messages in the WooCommerce general settings page under the section for WC Welcome Message.
4. Add the shortcode [wc_welcome_message] into a post, page, or widget.
5. Done!

== Frequently Asked Questions ==

= How do I style the message? =

The message is wrapped in a paragraph tag with the id of wc-welcome-message which can be used for css styles.

= How do I use this within a template file? =

Add the following code to your template file:
`<?php echo do_shortcode( '[wc_welcome_message]' ); ?>`

= What happens if I forget to add the message? =

By default, each message has a fallback which will display if a message isn't saved in the settings.

== Screenshots ==

1. WC Welcome Message fields in the WooCommerce settings.
2. WC Welcome Message shortcode in action in a widget!
3. A sample message for returning visitors.
4. A sample message for a guest.

== Changelog ==

= 1.0 =
Initial release