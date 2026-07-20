<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Footer - Main section
 */
$companyInfo = gpweb\inc\controller\CompanyInfo::getInstance();
$phones      = $companyInfo->getPhoneNumber();
$address     = $companyInfo->getAddress();
$email       = $companyInfo->getEmail();
$socials     = $companyInfo->getSocials();
$footerMain  = get_field( 'footer_main', 'gpw_settings' );
?>
<section class="footer__main">
  <div class="section__inner" data-width="lg">
    <?php if( !empty( $footerMain['slogan'] ) ): ?>
      <div class="footer__slogan">
        <h2 class="section__title"><?= wp_kses_post( $footerMain['slogan'] ) ?></h2>
      </div>
    <?php endif ?>
    <div class="footer__address-wrapper">
      <h3 class="footer__title"><?= __( 'Address', 'gpw' ) ?></h3>
      <p class="footer__address"><?= esc_html( $address ) ?></p>
      <?php if( !empty( $socials ) ): ?>
        <ul class="footer__socials">
          <?php foreach( $socials as $social ): ?>
            <li class="footer__social">
              <a href="<?= $social['link'] ? esc_url( $social['link']) : 'javascript:void(0);' ?>">
                <?= wp_get_attachment_image( $social['icon'], 'thumbnail' ) ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </div>
    <div class="footer__phone-wrapper">
      <h3 class="footer__title"><?= __( 'Contact', 'gpw' ) ?></h3>
      <?php if( !empty( $email ) ) : ?>
        <a class="footer__email" href="mailto:<?= esc_attr( $email) ?>"><?= esc_html( $email ) ?></a>
      <?php endif ?>
      <?php if( !empty( $phones ) ): ?>
        <?php foreach( $phones as $phone ): ?>
          <p class="footer__phone">
            <strong class="footer__phone-label"><?= esc_html( $phone['label'] ) ?>: </strong>
            <a href="tel:<?= esc_attr( $phone['number'] ) ?>"><?= esc_html( $phone['number'] ) ?></a>
          </p>
        <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>
</section>