<?php get_header(); ?>
<main>
  <section>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
    <?php
    // Example ACF field: hero_text
    if (function_exists('get_field')) {
      $hero = get_field('hero_text');
      if ($hero) { echo '<div class="hero">'.$hero.'</div>'; }
    }
    ?>
  </section>
</main>
<?php get_footer(); ?>
