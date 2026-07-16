<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Home page - About us section
 */
use gpweb\inc\base\Utilities as Utils;

$sectionData = get_field( 'about_us' );
if( empty( $sectionData['title'] ) && empty( $sectionData['side_images']['big_image'] ) ) {
  return;
}
?>
<section class="about-us">
  <div class="section__inner grid-repeated-cols">
  <?php if( !empty( $sectionData['side_images']['big_image'] ) ): ?>
    <aside class="about-us__images">
      <div class="about-us__images-big-wrapper">
        <?= wp_get_attachment_image( $sectionData['side_images']['big_image'], 'full', false, [ 'class' => 'about-us__images-big'] ) ?>
      </div>
    
    <?php if( !empty( $sectionData['side_images']['small_image'] ) ) {
      echo sprintf( '<div class="about-us__images-small-wrapper">%s</div>',
        wp_get_attachment_image( $sectionData['side_images']['small_image'], 'full', false, [ 'class' => 'about-us__images-small'] )
      );
    } ?>

    <?php if( !empty( $sectionData['side_images']['vertical_text'] ) ) {
      echo sprintf( '<p class="about-us__images-vertical-text">%s</p>', esc_html( $sectionData['side_images']['vertical_text'] ) );
    } ?>
    </aside>
  <?php endif ?>
    <main class="about-us__main">
    <?php if( !empty( $sectionData['sub_title'] ) ): ?>
      <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
    <?php endif ?>
      
    <?php if( !empty( $sectionData['title'] ) ): ?>
      <h1 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h1>
    <?php endif ?>
      
    <?php if( !empty( $sectionData['content'] ) ): ?>
      <div class="section__description about-us__content"><?= wp_kses_post( $sectionData['content'] ) ?></div>
    <?php endif ?>
    <?php if( !empty( $sectionData['people']['images'] ) ) : ?>
      <div class="about-us__people">
        <ul class="about-us__people-list">
        <?php foreach( $sectionData['people']['images'] as $imgID ): ?>
          <li class="about-us__people-item"><?= wp_get_attachment_image( $imgID, 'thumbnail' ) ?></li>      
        <?php endforeach ?>
        </ul>
        <?php if( !empty( $sectionData['people']['description'] ) ): ?>
          <p class="about-us__people-desc"><?= esc_html( $sectionData['people']['description'] ) ?></p>
        <?php endif ?>
      </div>
    <?php endif ?>

    <?php if( !empty( $sectionData['icon_box']['icon'] ) && !empty( $sectionData['icon_box']['label'] ) ): ?>
      <div class="about-us__icon-box">
        <div class="about-us__icon-box-icon"><?= wp_get_attachment_image( $sectionData['icon_box']['icon'], 'thumbnail' ) ?></div>
        <strong class="about-us__icon-box-label"><?= esc_html( $sectionData['icon_box']['label'] ) ?></strong>
        
      <?php if( !empty( $sectionData['icon_box']['description'] ) ) : ?>
        <p class="about-us__icon-box-description"><?= esc_html( $sectionData['icon_box']['description'] ) ?></p>
      <?php endif ?>
      </div>
    <?php endif ?>

    <?php if( !empty( $sectionData['link_to']['label'] ) ) {
      get_template_part( 'gpw-templates/global/jins-button', null, [
        'label'     => $sectionData['link_to']['label'],
        'href'      => Utils::getUrl( $sectionData['link_to'] ),
        'variant'   => $sectionData['link_to']['style'],
        'theme'     => 'secondary',
        'rounded'   => 'full',
        'size'      => 'medium',
        'icon_code' => 'arrow_outward'
      ] );
    } ?>
    </main>
  </div>
</section>