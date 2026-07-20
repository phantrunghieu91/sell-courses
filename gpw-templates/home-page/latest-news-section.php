<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Home page - Latest news section
 */
$sectionData = get_field( 'latest_news' );
$posts       = get_posts( [
  'numberposts' => 3,
  'post_status' => 'publish',
] );
if( empty( $posts ) ) {
  return;
}
?>
<section class="latest-news">
  <div class="section__inner" data-width="lg">

    <?php if( !empty( $sectionData['title'] ) ): ?>
    <div class="latest-news__title-wrapper">
      <div class="latest-news__title-wrapper-inner">
        <?php if( !empty( $sectionData['sub_title'] ) ): ?>
          <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
        <?php endif ?>
        
        <?php if( !empty( $sectionData['title'] ) ): ?>
          <h2 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h2>
        <?php endif ?>
      </div>
    </div>
    <?php endif ?>

    <div class="latest-news__posts">
      <?php foreach( $posts as $post ) {
        setup_postdata( $post );
        get_template_part( 'gpw-templates/post/post-card', null, [ 'has_read_more' => true, 'orientation' => 'horizontal' ] );
      } ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</section>