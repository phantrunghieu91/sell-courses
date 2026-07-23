<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Home page - Latest news section
 */
$sectionData = get_field( 'latest_news' );
$posts       = get_posts( [
  'numberposts' => 5,
  'post_status' => 'publish',
] );
if( empty( $posts ) ) {
  return;
}
$slideItems = [];
foreach( $posts as $post ) {
  ob_start();
  setup_postdata( $post );
  get_template_part( 'gpw-templates/post/post-card', null, [ 'has_read_more' => true ] );
  $slideItems[] = ob_get_clean();
}
wp_reset_postdata();
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

    <div class="latest-news__carousel">
      <?php get_template_part( 'gpw-templates/global/swiper-template', null, [ 'slide_items' => $slideItems, 'has_nav' => true ] ) ?>
    </div>
  </div>
</section>