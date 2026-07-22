<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Global - Hero section
 */
use gpweb\inc\base\Utilities as Utils;
$currentObj         = get_queried_object();
$displayBreadcrumbs = $args['display_breadcrumbs'] ?? false;
$sectionData        = get_field( 'hero', $currentObj->post_type === 'page' ? $currentObj->ID : $currentObj );
$bgImgID = $sectionData['background_image'] ?? 260;
$title              = !empty( $sectionData['title'] ) ?
                        wp_kses_post( $sectionData['title'] ) : 
                        sprintf( '<span>%s</span>', $currentObj->post_type === 'page' ? 
                          ( is_home() ? get_the_title( get_option( 'page_for_posts' ) ) : get_the_title() ) : 
                          esc_html( $currentObj->name ) );
?>
<section class="hero pile">
  <?php if( !empty( $bgImgID ) ): ?>
    
    <div class="bg-box" style="background-image:url(<?= wp_get_attachment_image_url( $bgImgID, 'full' ) ?>);"></div>

  <?php endif ?>
  <div class="section__inner" data-width="extra-large">

    <?php if( !empty( $sectionData['sub_title'] ) ): ?>
    <span class="hero__sub-title section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
    <?php endif ?>
    
    <?php if( !empty( $title ) ): ?>
    <h1 class="hero__title section__title"><?= $title ?></h1>
    <?php endif ?>

    <?php if( true === $displayBreadcrumbs && function_exists( 'rank_math_the_breadcrumbs' ) ) {
      echo '<div class="hero__breadcrumbs">';
      rank_math_the_breadcrumbs();
      echo '</div>';
    } ?>
    
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