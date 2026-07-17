<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Home page - Roadmap section
 */
use gpweb\inc\base\Utilities as Utils;

$sectionData = get_field( 'roadmap' );
$items       = $sectionData['item']    ?? [];
$contact     = $sectionData['contact'] ?? [];
if( empty( $items ) ) {
  return;
}
?>
<section class="roadmap pile">
  <div class="bg-box"></div>
  <div class="section__inner" data-width="lg">
  <aside class="roadmap__title-wrapper">
    <div class="roadmap__title-wrapper-inner">
      <?php if( !empty( $sectionData['sub_title'] ) ): ?>
        <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['title'] ) ): ?>
        <h1 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h1>
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
          'size'      => 'medium',
          'icon_code' => 'arrow_outward'
        ] );
      } ?>
    </div>
  </aside>
  <main class="roadmap__main">
    <ul class="roadmap__item-list grid-repeated-cols">

    <?php foreach( $items as $item ): ?>

      <li class="roadmap__item">
        <div class="roadmap__item-icon"><?= wp_get_attachment_image( $item['icon'], 'thumbnail' ) ?></div>
        <h4 class="roadmap__item-label"><?= esc_html( $item['label'] ) ?></h4>
        <?php if( !empty( $item['content'] ) ) : ?>
          <div class="roadmap__item-content"><?= wp_kses_post( $item['content'] ) ?></div>
        <?php endif ?>
      </li>

    <?php endforeach ?>

    </ul>
  
  <?php if( !empty( $contact['slogan'] ) || !empty( $contact['link_to']['label'] ) ): ?>
    <div class="roadmap__contact">
    <?php if( !empty( $contact['slogan'] ) ) : ?>
      <p class="roadmap__contact-slogan"><?= esc_html( $contact['slogan'] ) ?></p>
    <?php endif ?>

    <?php if( !empty( $contact['link_to']['label'] ) ) {
      get_template_part( 'gpw-templates/global/jins-button', null, [
        'label'   => $contact['link_to']['label'],
        'href'    => Utils::getUrl( $contact['link_to'] ),
        'variant' => $contact['link_to']['style'],
        'theme'   => 'secondary',
        'rounded' => 'full',
        'size'    => 'small',
      ] );
    } ?>
    </div>
  <?php endif ?>
  </main>
  </div>
</section>
