<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption']);

// Disable block editor if you want classic experience
add_filter('use_block_editor_for_post', '__return_false');

// Hide WP admin bar for non-admins
if (!current_user_can('administrator')) {
  add_filter('show_admin_bar', '__return_false');
}

// Clean up WP header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Add support for uploading SVGs if you want
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
?>
