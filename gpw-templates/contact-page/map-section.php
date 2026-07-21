<?php 
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Contact page - Map section
 */
$googleMap = get_field( 'google_map' );
if( empty( $googleMap )) {
  return;
}
$googleMap = preg_replace('/width="[0-9]+"|height="[0-9]+"/', '', $googleMap);
?>
<section class="map">
  <div class="section__inner" data-width="full">
    <?= $googleMap ?>
  </div>
</section>