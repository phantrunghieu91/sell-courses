<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Home page - Project section
 */
use gpweb\inc\base\Utilities as Utils;

$sectionData = get_field( 'project' );
$projects    = $sectionData['item'] ?? [];
if( empty( $projects ) ) {
  return;
}
?>
<section class="project">
  <div class="section__inner" data-width="large">
    <aside class="section__title-wrapper">
      <div class="section__title-wrapper-inner">
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
            'size'      => 'medium',
            'icon_code' => 'arrow_outward'
          ] );
        } ?>
      </div>
    </aside>
    <main class="project__grid-wrapper">
      <div class="project__grid">
        <?php foreach( $projects as $project ): if( empty( $project['logo'] ) ) continue; ?>
          <article class="project__item">
            <?= wp_get_attachment_image( $project['logo'], 'medium', false, [ 'class' => 'project__item-logo' ] ) ?>
            <span class="project__item-label"><?= esc_html( $project['label'] ) ?></span>
          </article>
        <?php endforeach ?>
      </div>
    </main>
  </div>
</section>