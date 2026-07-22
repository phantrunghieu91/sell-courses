<?php 
/**
 * @author Hieu "Jin" Phan Trung
 * * Template name: JINS PAGE - Page under development template
 */
get_template_part( 'gpw-templates/global/header' );

get_template_part( 'gpw-templates/global/hero-section', null, [ 'display_breadcrumbs' => true ] );

?>

<section style="padding-block:6.25rem;">
  <div class="section__inner" data-width="large">
    <h2 style="text-align:center;"><?= __('This page is under development. Please visit later!', 'gpw') ?>. <br><a href="<?= home_url() ?>">Back to home page.</a></h2>
  </div>
</section>

<?php

get_template_part( 'gpw-templates/global/footer' );