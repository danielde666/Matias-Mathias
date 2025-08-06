<?php
// Fallback template required by WordPress.
// You can route this to a real template or leave it minimal.
get_header(); ?>

<main>
  <h1><?php bloginfo('name'); ?></h1>
  <p><?php bloginfo('description'); ?></p>
  <p>This is the fallback index template.</p>
</main>

<?php get_footer(); ?>
