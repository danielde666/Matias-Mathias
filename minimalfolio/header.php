<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Matias&nbsp;&amp;&nbsp;Mathias</title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Matias&nbsp;&amp;&nbsp;Mathias</a></h1>
  <header class="site-header">
  
  <?php
        // Replace 'site-settings' with the actual slug or title of your page
        $globals = get_page_by_path('site-settings'); // or by title
        if ($globals) {
            $site_settings_id = $globals->ID;
            // Example usage:
            echo get_field('site_description', $site_settings_id); // 'site_description' is your field name
            echo get_field('contact', $site_settings_id); // 'contact' is your field name
            echo get_field('social', $site_settings_id); // 'social' is your field name
            echo get_field('info', $site_settings_id); // 'info' is your field name
        }
        ?>

  </header>
