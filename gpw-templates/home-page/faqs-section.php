<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Home page - FAQs section
 */
$sectionData = get_field( 'faqs' );
$items       = $sectionData['faq'] ?? [];
if( empty( $items ) ) {
  return;
}
$accordionItems = array_map( function( $item ) {
  return [
    'title'   => $item['question'],
    'content' => $item['answer']
  ];
}, $items );
$contact = $sectionData['contact_block'] ?? [];
?>
<section class="faqs">
  <div class="section__inner" data-width="lg">
    <aside class="section__title-wrapper">
      <div class="section__title-wrapper-inner">

        <?php if( !empty( $sectionData['sub_title'] ) ): ?>
          <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
        <?php endif ?>
        
        <?php if( !empty( $sectionData['title'] ) ): ?>
          <h2 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h2>
        <?php endif ?>
        
        <?php if( !empty( $contact['label'] ) || !empty( $contact['customer_services'] ) ): ?>
          <div class="faqs__contact">
            <?php if( !empty( $contact['customer_services'] ) ) : ?>
              <div class="faqs__contact-support">
                <?php foreach( $contact['customer_services'] as $imgID ) {
                  echo jins_render_image( $imgID, 'thumbnail' );
                } ?>
              </div>
            <?php endif ?>
            <?php if( !empty( $contact['label'] ) ) : ?>
              <h3 class="faqs__contact-label"><?= esc_html( $contact['label'] ) ?></h3>
            <?php endif ?>
            <?php if( !empty( $contact['description'] ) ) : ?>
              <div class="faqs__contact-description"><?= wp_kses_post( $contact['description'] ) ?></div>
            <?php endif ?>
            <?php if( !empty( $contact['hotline'] ) ) : ?>
              <p class="faqs__contact-hotline">
                <i class="fa-solid fa-phone-volume"></i>
                <a href="tel:<?= esc_attr( $contact['hotline'] ) ?>"><?= esc_html( $contact['hotline'] ) ?></a>
              </p>
            <?php endif ?>
          </div>
        <?php endif ?>
        
      </div>
    </aside>
    <main class="faqs__list-wrapper">
      <?php get_template_part( 'gpw-templates/global/accordion-template', null, [ 'items' => $accordionItems, 'has_icon' => true ] ) ?>
    </main>
  </div>
</section>