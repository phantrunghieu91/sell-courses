<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Global - Hero section
 */
use gpweb\inc\base\Utilities as Utils;
$sectionData = get_field( 'hero' );
$bgImgID     = $sectionData['background_image'] ?? false;
?>
<section class="hero pile">
  <?php if( !empty( $bgImgID ) ): ?>
    
    <div class="bg-box" style="background-image:url(<?= wp_get_attachment_image_url( $bgImgID, 'full' ) ?>);"></div>

  <?php endif ?>
  <div class="section__inner" data-width="extra-large">

    <?php if( !empty( $sectionData['sub_title'] ) ): ?>
    <span class="hero__sub-title section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
    <?php endif ?>
    
    <?php if( !empty( $sectionData['title'] ) ): ?>
    <h1 class="hero__title section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h1>
    <?php endif ?>
    
    <?php if( !empty( $sectionData['description'] ) ): ?>
    <div class="hero__description section__description"><?= wp_kses_post( $sectionData['description'] ) ?></div>
    <?php endif ?>

    <?php if( !empty( $sectionData['button'] ) ) : ?>
    <div class="hero__buttons">

      <?php foreach( $sectionData['button'] as $button ) {
        get_template_part( 'gpw-templates/global/jins-button', null, [
          'label'     => $button['label'],
          'href'      => Utils::getUrl( $button ),
          'icon_code' => 'arrow_outward',
          'theme'     => 'secondary',
          'variant'   => $button['style'] ?? 'link',
          'rounded'   => 'full',
          'size'      => 'medium',
          'class'     => 'hero__button'
        ] );
      } ?>
    </div>
    <?php endif ?>
      
    <?php if( !empty( $sectionData['features'] ) ) : ?>
    <ul class="hero__features">
      
      <?php foreach( $sectionData['features'] as $feature ): if( empty( $feature['content'] ) ) continue; ?>
      <li class="hero__feature">
        <?= wp_get_attachment_image( $feature['icon'], 'thumbnail', false, [ 'class' => 'hero__feature-icon' ] ) ?>
        <div class="hero__feature-content"><?= wp_kses_post( $feature['content'] ) ?></div>
      </li>
      <?php endforeach ?>
      
    </ul>
    <?php endif ?>
  </div>
</section>