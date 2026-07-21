<?php 
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Contact page - Contact info section
 */
$sectionData = get_field( 'contact_info' );
if( empty( $sectionData['cf7_sc'] ) )  {
  return;
}
?>
<section class="contact-info">
  <div class="section__inner" data-width="lg">
    <?php if( !empty( $sectionData['sub_title'] ) ): ?>
      <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
    <?php endif ?>
    <?php if( !empty( $sectionData['title'] ) ): ?>
      <h2 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h2>
    <?php endif ?>
    <div class="contact-info__wrapper">
      <div class="contact-info__form-wrapper">
        <?php if( !empty( $sectionData['form_title'] ) ) : ?>
          <h3 class="contact-info__form-title"><?= esc_html( $sectionData['form_title'] ) ?></h3>
        <?php endif ?>
        <?php if( !empty( $sectionData['form_desc'] ) ) : ?>
          <div class="contact-info__form-desc"><?= esc_html( $sectionData['form_desc'] ) ?></div>
          <?= do_shortcode( $sectionData['cf7_sc'] ) ?>
        <?php endif ?>
      </div>
      <?php if( !empty( $sectionData['contact'] ) ) : ?>
        <div class="contact-info__contact-wrapper">
          <ul class="contact-info__contact-list">
            <?php foreach( $sectionData['contact'] as $contact ): 
              if( empty( $contact['label'] ) && empty( $contact['content'] ) ) {
                continue;
              }
            ?>  
              <li class="contact-info__contact">
                <div class="contact-info__contact-icon"><?= wp_get_attachment_image( $contact['icon'] ) ?></div>
                <?php if( !empty( $contact['label'] )) : ?>
                  <h4 class="contact-info__contact-label"><?= esc_html( $contact['label'] ) ?></h4>
                <?php endif ?>
                <?php if( !empty( $contact['content'] )) : ?>
                  <div class="contact-info__contact-content"><?= wp_kses_post( $contact['content']) ?></div>
                <?php endif ?>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>