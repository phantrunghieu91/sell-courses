<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: About page - about founder
 */
use gpweb\inc\base\Utilities as Utils;

$sectionData      = get_field( 'about_founder' );
$features         = $sectionData['feature'];
$bgImgID          = $sectionData['background_image'];
$videoData        = $sectionData['video'];
$popoverElementID = 'about-founder-popover';
?>
<section class="about-founder pile">
  <?php if( !empty( $bgImgID ) ): ?>
    
    <div class="bg-box" style="background-image:url(<?= wp_get_attachment_image_url( $bgImgID, 'full' ) ?>);"></div>

  <?php endif ?>
  <div class="section__inner">
    <div class="about-founder__title-wrapper">
      <?php if( !empty( $sectionData['sub_title'] ) ): ?>
        <span class="section__sub-title"><?= esc_html( $sectionData['sub_title'] ) ?></span>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['title'] ) ): ?>
        <h2 class="section__title"><?= wp_kses_post( $sectionData['title'] ) ?></h2>
      <?php endif ?>
      
      <?php if( !empty( $sectionData['description'] ) ): ?>
        <div class="section__description"><?= wp_kses_post( $sectionData['description'] ) ?></div>
      <?php endif ?>
    </div>
    <?php if( !empty( $videoData['video'] ) || !empty( $video['youtube_link'] ) ) : ?>
      <div class="about-founder__play-btn-wrapper">
        <button class="about-founder__play-btn jins-button" data-variant="gradient" data-theme="secondary"
          popovertarget="<?= esc_attr( $popoverElementID ) ?>" popovertargetaction="show">
          <i class="fa-solid fa-play"></i>
        </button>
        <?php if( !empty( $videoData['button_label'] ) ) : ?>
          <span><?= esc_html( $videoData['button_label'] ) ?></span>
        <?php endif ?>
      </div>
      <div class="about-founder__popover" id="<?= esc_attr( $popoverElementID ) ?>" popover="auto">
        <button class="about-founder__popover-close-btn jins-button" data-variant="filled"
          popovertarget="<?= esc_attr( $popoverElementID ) ?>" popovertargetaction="hide">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="about-founder__popover-video-wrapper">
          <?php echo match( $videoData['type'] ) {
            'youtube_link' => Utils::renderYoutubeEmbed( $videoData['youtube_link'] ),
            default        => Utils::renderVideoBlock( $videoData['video'] ),
          } ?>
        </div>
      </div>
    <?php endif ?>
    <?php if( !empty( $features ) ) : ?>
      <ul class="about-founder__feature-list">
        <?php foreach( $features as $feature ) : if( empty( $feature['label'] ) ) continue; ?>
          <li class="about-founder__feature-item">
            <i class="fa-solid fa-check"></i>
            <span><?= esc_html( $feature['label'] ) ?></span>
          </li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>
  </div>
</section>
  