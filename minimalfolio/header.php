<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="site-header">
  <h1><?php the_title(); ?></h1>
  
  <?php
        // Replace 'site-settings' with the actual slug or title of your page
        $globals = get_page_by_path('site-settings'); // or by title
        if ($globals) {
            $site_settings_id = $globals->ID;
            // Example usage:
            echo get_field('site_description', $site_settings_id); // 'header_cta' is your field name
        }
        ?>

  </header>
