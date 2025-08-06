<?php get_header(); ?>

<main>
  <article>
    <?php if (function_exists('get_field')): ?>
      <div>
        <h2><?php the_field('project_title'); ?></h2>
        <p><strong>Project Name:</strong> <?php the_field('project_name'); ?></p>
        <p><strong>Directed By:</strong> <?php the_field('directed_by'); ?></p>
        <p><strong>Shot By:</strong> <?php the_field('shot_by'); ?></p>
        <p><strong>Location:</strong> <?php the_field('location'); ?></p>
        <?php 
          $hero = get_field('hero_image');
          if ($hero) {
            echo '<img src="' . esc_url($hero['url']) . '" alt="' . esc_attr($hero['alt']) . '" style="max-width:100%;height:auto;">';
          }
        ?>
        <?php 
          $video_url = get_field('video_url');
          if ($video_url) {
            // Embed Vimeo or YouTube
            if (strpos($video_url, 'youtube') !== false || strpos($video_url, 'youtu.be') !== false) {
              echo '<div class="video-embed"><iframe width="560" height="315" src="https://www.youtube.com/embed/' . htmlspecialchars(get_youtube_id($video_url)) . '" frameborder="0" allowfullscreen></iframe></div>';
            } elseif (strpos($video_url, 'vimeo') !== false) {
              echo '<div class="video-embed"><iframe src="https://player.vimeo.com/video/' . htmlspecialchars(get_vimeo_id($video_url)) . '" width="640" height="360" frameborder="0" allowfullscreen></iframe></div>';
            } else {
              echo '<a href="' . esc_url($video_url) . '" target="_blank">View Video</a>';
            }
          }
        ?>
      </div>
    <?php endif; ?>
    <div>
      <?php the_content(); ?>
    </div>
  </article>
</main>
<?php get_footer(); ?>

<?php
// Helpers to extract YouTube/Vimeo IDs
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
