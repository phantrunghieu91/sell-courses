<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Template name: JINS PAGE - Projects
 */
$projects = get_field( 'projects' );

get_template_part( 'gpw-templates/global/header' );

get_template_part( 'gpw-templates/global/hero-section', null, [ 'display_breadcrumbs' => true ] );

if ( !empty( $projects ) ):
  foreach( $projects as $project ) : if( empty( $project['item'] ) ) continue;
    ?>

    <section class="project pile">
      <div class="bg-box"></div>
      <div class="section__inner" data-width="extra-large">
        <?php if( !empty( $project['title'] ) ) : ?>
          <h2 class="section__title"><?= wp_kses_post( $project['title'] ) ?></h2>
        <?php endif ?>
        <?php if( !empty( $project['description'] ) ) : ?>
          <div class="section__description"><?= wp_kses_post( $project['description'] ) ?></div>
        <?php endif ?>
        <div class="project__logos">
          <?php foreach( $project['item'] as $item ) : 
            if( empty( $item['logo'] ) ) continue; 
            $itemLabel = $item['label'] ?: '';
          ?>
            <article class="project__item">
              <?= wp_get_attachment_image( $item['logo'], 'medium_large', false, [ 'class' => 'project__item-logo', 'alt' => $itemLabel ]) ?>
              <?php if( !empty( $itemLabel ) ) : ?>
                <span class="project__item-label"><?= esc_html( $itemLabel ) ?></span>
              <?php endif ?>
            </article>
          <?php endforeach ?>
        </div>
      </div>
    </section>

  <?php
  endforeach;
endif;
get_template_part( 'gpw-templates/global/footer' );