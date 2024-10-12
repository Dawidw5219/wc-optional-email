<?php
/**
 * Plugin Name: Optional Email for WooCommerce
 * Description: Makes the email field optional (not mandatory) on the WooCommerce checkout page
 * Version: 1.0.0
 * Author: Dawid Wiewiórski
 * Author URI:  https://app4you.dev
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
	exit;
}

add_action('wp_enqueue_scripts', 'wc_optional_email_scripts');
function wc_optional_email_scripts()
{
	//wp_enqueue_script('custom-wc-email-validation-script', plugin_dir_url(__FILE__) . 'assets/wc-optional-email.js', array('jquery'), '1.0', true);
	wp_enqueue_style('custom-wc-email-validation-style', plugin_dir_url(__FILE__) . 'assets/wc-optional-email.css');
}

/*
	Ustawienie domyślnego adres e-mail
*/
function wc_optional_email_enforce_default_email()
{
	if (empty($_POST['billing_email'])) {
		$_POST['billing_email'] = 'example@example.com';
	}
}
add_action('woocommerce_checkout_process', 'wc_optional_email_enforce_default_email');
