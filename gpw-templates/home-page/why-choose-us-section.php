<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Home page - Why choose us section
 */
$sectionData = get_field( 'why_choose_us' );
if( empty( $sectionData['images'] ) ) {
  return;
}
$slideItems = [];
foreach( $sectionData['images'] as $imgID ) {
  $slideItems[] = jins_render_image( $imgID, 'large', 'why-choose-us__image' );
}
?>
<section class="why-choose-us">
  <div class="section__inner">
    <div class="why-choose-us__content">
      <?php if( !empty( $sectionData['sub_title'] ) ): ?>
        <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['title'] ) ): ?>
        <h2 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h2>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['description'] ) ): ?>
        <div class="section__description"><?= wp_kses_post( $sectionData['description'] ) ?></div>
      <?php endif ?>

      <?php if( !empty( $sectionData['feature'] ) ): ?>
        <ul class="why-choose-us__features">

          <?php foreach( $sectionData['feature'] as $feature ) : if( empty( $feature['label'] ) ) continue; ?>
            <li class="why-choose-us__feature">
              <?php if( !empty( $feature['number'] ) ): ?>
              <div class="why-choose-us__feature-number">
                <span><?= esc_html( $feature['number'] ) ?></span>
              </div>
              <?php endif ?>
              <p class="why-choose-us__label"><?= esc_html( $feature['label'] ) ?></p>
            </li>
          <?php endforeach ?>

        </ul>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['content'] ) ): ?>
        <div class="why-choose-us__content-text"><?= wp_kses_post( $sectionData['content'] ) ?></div>
      <?php endif ?>
    </div>
    <div class="why-choose-us__carousel">
      <?php get_template_part( 'gpw-templates/global/swiper-template', null, ['slide_items' => $slideItems, 'has_nav' => true ] ) ?>
    </div>
  </div>
</section>