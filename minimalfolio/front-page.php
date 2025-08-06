<?php get_header(); ?>
<main>
  <section>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
  </section>
  <section>
   <ul class="project-list">
  <?php
  $latest_posts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 6, // or change to -1 for all
  ]);
  if ($latest_posts->have_posts()) :
    while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
      <li class="project-list-item">
        <h3><a href="<?php the_permalink(); ?>"><?php the_field('project_title'); ?></a></h3>
        <p><strong>Project Name:</strong> <?php the_field('project_name'); ?></p>
        <p><strong>Directed By:</strong> <?php the_field('directed_by'); ?></p>
        <p><strong>Shot By:</strong> <?php the_field('shot_by'); ?></p>
        <p><strong>Location:</strong> <?php the_field('location'); ?></p>
        <?php 
          $hero = get_field('hero_image');
          if ($hero) {
            echo '<div class="project-hero-image"><img src="' . esc_url($hero['url']) . '" alt="' . esc_attr($hero['alt']) . '"></div>';
          }
        ?>
        <?php 
          $video_url = get_field('video_url');
          if ($video_url) {
            // Video embed (YouTube or Vimeo)
            if (strpos($video_url, 'youtube') !== false || strpos($video_url, 'youtu.be') !== false) {
              echo '<div class="video-embed"><iframe width="320" height="180" src="https://www.youtube.com/embed/' . htmlspecialchars(get_youtube_id($video_url)) . '" frameborder="0" allowfullscreen></iframe></div>';
            } elseif (strpos($video_url, 'vimeo') !== false) {
              echo '<div class="video-embed"><iframe src="https://player.vimeo.com/video/' . htmlspecialchars(get_vimeo_id($video_url)) . '" width="320" height="180" frameborder="0" allowfullscreen></iframe></div>';
            } else {
              echo '<a href="' . esc_url($video_url) . '" target="_blank">View Video</a>';
            }
          }
        ?>
      </li>
    <?php endwhile;
    wp_reset_postdata();
  else : ?>
    <li>No projects found.</li>
  <?php endif; ?>
</ul>

  </section>
</main>
<?php get_footer(); ?>


<?php
function get_youtube_id($url) {
    if (preg_match('/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|embed\/|v\/))([^\?&"\'>]+)/', $url, $matches)) {
        return $matches[4];
    }
    return '';
}
function get_vimeo_id($url) {
    if (preg_match('/vimeo\.com\/(?:video\/)?(\d+)/', $url, $matches)) {
        return $matches[1];
    }
    return '';
}
?>

