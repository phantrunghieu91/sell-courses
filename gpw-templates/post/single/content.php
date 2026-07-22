<?php 
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Single post page - Content
 */
$thumbnailID = get_post_thumbnail_id();
?>
<section class="single-content">
  <?php if( $thumbnailID !== false ) { 
    echo wp_get_attachment_image( $thumbnailID, 'full', false, [ 'class' => 'single-content__thumbnail', 'alt' => get_the_title() ] );
  } ?>
  <div class="section__inner" data-width="large">
    <?php the_content() ?>
  </div>
</section>