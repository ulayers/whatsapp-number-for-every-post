<?php

/**
 * Plugin Name:          Whatsapp Number For Every Post
 * Plugin URI:           https://ulayers.com
 * Description:          Different Whatsapp Number For Every Post
 * Version:              1.0.0
 * Author:               Mohamed Ali
 * Author URI:           https://ulayers.com
 * License:              GPL-2.0+
 * License URI:          http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue Front Css File
 * Version 1.0.0
 */
function wnfep_enqueue_styles()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_enqueue_style('wnfep-main', plugin_dir_url(__FILE__) . 'assets/wnfep-css-main.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'wnfep_enqueue_styles');

/**
 * Whatsapp Number Button ShortCode
 * Version 1.0.0
 * You can use [wnfep_whatsapp_button] in anywhere
 */
function wnfep_whatsapp_number_shortcode()
{
    global $post;

    $whatsapp_number = get_post_meta($post->ID, 'whatsapp_number', true);

    if (!$whatsapp_number) {
        return '';
    }

    // Create the WhatsApp link button
    $button_html = '<a href="https://api.whatsapp.com/send?phone=' . esc_attr($whatsapp_number) . '" class="wnfep-whatsapp-button" target="_blank"><i class="fa-brands fa-whatsapp"></i> Contact on WhatsApp</a>';

    return $button_html;
}
add_shortcode('wnfep_whatsapp_button', 'wnfep_whatsapp_number_shortcode');
