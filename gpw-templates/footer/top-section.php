<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Footer - Top section
 */
$sectionData = get_field( 'footer_top', 'gpw_settings' );
if( empty( $sectionData['cf7_sc'] ) ) {
  return;
}
$companyInfo = gpweb\inc\controller\CompanyInfo::getInstance();
$phone       = $companyInfo->getPhoneNumber() ? $companyInfo->getPhoneNumber()[0]['number'] : '';
$email       = $companyInfo->getEmail();
$address     = $companyInfo->getAddress();
?>
<section class="contact">
  <div class="section__inner">
    <header class="contact__header">
      <?php if( !empty( $sectionData['sub_title'] ) ): ?>
        <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['title'] ) ): ?>
        <h2 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h2>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['description'] ) ): ?>
        <div class="section__description"><?= wp_kses_post( $sectionData['description'] ) ?></div>
      <?php endif ?>
    </header>

    <main class="contact__main">
      <div class="contact__info">
        <?php if( !empty( $phone ) ) : ?>
          <div class="contact__item">
            <div class="contact__item-icon">
              <i class="fa-solid fa-phone"></i>
            </div>
            <span class="contact__item-label"><?= __('Hotline', 'gpw') ?></span>
            <div class="contact__item-content">
              <a href="tel:<?= esc_attr( $phone ) ?>"><?= esc_html( $phone ) ?></a>
            </div>
          </div>
        <?php endif ?>
        <?php if( !empty( $email ) ) : ?>
          <div class="contact__item">
            <div class="contact__item-icon">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <span class="contact__item-label"><?= __('Email', 'gpw') ?></span>
            <div class="contact__item-content">
              <a href="mailto:<?= esc_attr( $email ) ?>"><?= esc_html( $email ) ?></a>
            </div>
          </div>
        <?php endif ?>
        <?php if( !empty( $address ) ) : ?>
          <div class="contact__item">
            <div class="contact__item-icon">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <span class="contact__item-label"><?= __('Address', 'gpw') ?></span>
            <div class="contact__item-content">
              <a href="mailto:<?= esc_attr( $address ) ?>"><?= esc_html( $address ) ?></a>
            </div>
          </div>
        <?php endif ?>
      </div>
      <?= do_shortcode( $sectionData['cf7_sc'] ) ?>
    </main>
  </div>
</section>