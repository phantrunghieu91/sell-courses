<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: About page - Founder info
 */
use gpweb\inc\base\Utilities as Utils;

$sectionData = get_field( 'founder_info' );
if( empty( $sectionData['achievement'] ) ) {
  return;
}
?>
<section class="founder">
  <div class="section__inner">
    <header class="founder__header">
      <?php if( !empty( $sectionData['sub_title'] ) ): ?>
        <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['title'] ) ): ?>
        <h2 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h2>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['description'] ) ): ?>
        <div class="section__description"><?= wp_kses_post( $sectionData['description'] ) ?></div>
      <?php endif ?>
      <?php if( !empty( $sectionData['link_to']['label'] ) ) {
        get_template_part( 'gpw-templates/global/jins-button', null, [
          'label'     => $sectionData['link_to']['label'],
          'href'      => Utils::getUrl( $sectionData['link_to'] ),
          'variant'   => $sectionData['link_to']['style'],
          'theme'     => 'secondary',
          'rounded'   => 'full',
          'size'      => 'large',
          'icon_code' => 'arrow_outward'
        ] );
      } ?>
    </header>
    <main class="founder__achievement">
      <?php foreach( $sectionData['achievement'] as $achieve ): if( empty( $achieve['image'] ) ) continue; ?>
        <div class="founder__item">
          <?= jins_render_image( $achieve['image'], 'large', 'founder__item-image', [ 'alt' => $achieve['label'] ] ) ?>
          <h4 class="founder__item-label"><?= esc_html( $achieve['label'] ) ?></h4>
        </div>
      <?php endforeach ?>
    </main>
  </div>
</section>