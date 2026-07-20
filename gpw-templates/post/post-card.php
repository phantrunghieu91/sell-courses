<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Post card
 */
$orientation    = $args['orientation']   ?? 'vertical';
$hasExcerpt     = $args['has_excerpt']   ?? true;
$hasReadMoreBtn = $args['has_read_more'] ?? false;

$postID      = get_the_ID();
$title       = get_the_title();
$excerpt     = get_the_excerpt();
$link        = get_permalink();
$thumbnailID = get_post_thumbnail_id() ?: PLACEHOLDER_IMAGE_ID;
?>
<article <?= post_class( 'jins-card' ) ?> aria-orientation="<?= esc_attr( $orientation ) ?>">
  <a class="jins-card__thumbnail" href="<?= esc_url( $link ) ?>">
    <?= jins_render_image( $thumbnailID, 'medium_large', '', [ 'alt' => esc_attr( $title ) ] ) ?>
  </a>
  <div class="jins-card__content">
    <h4 class="jin-card__title line-clamp">
      <a href="<?= esc_url( $link ) ?>"><?= esc_html( $title ) ?></a>
    </h4>
    <?php if( true === $hasExcerpt ) : ?>
      <div class="jins-card__excerpt line-clamp"><?= wp_kses_post( $excerpt ) ?></div>
    <?php endif ?>
    <?php if( true === $hasReadMoreBtn ) {
      get_template_part( 'gpw-templates/global/jins-button', null, [
        'label'     => __( 'Read more', 'gpw' ),
        'href'      => esc_url( $link ),
        'variant'   => 'gradient',
        'theme'     => 'secondary',
        'icon_code' => 'arrow_outward',
        'size'      => 'small',
        'rounded'   => 'full',
        'class'     => 'jins-card__read-more',
      ] );
    } ?>
  </div>
</article>