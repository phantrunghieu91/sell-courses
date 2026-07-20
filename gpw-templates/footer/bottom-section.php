<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * Bottom section of the footer.
 */
$footerMenuID = 4;
?>
<section class="footer__bottom">
  <div class="section__inner" data-width="lg">
    <?php get_template_part( 'gpw-templates/footer/menu-block', null, [ 'menu_id' => $footerMenuID ] ) ?>
    <div class="footer__copy-right-wrapper">
      <p class="footer__copyright">Copyright © <?= date( 'Y' ) ?> <?= get_bloginfo( 'name' ) ?></p>
      <p class="footer__designed-by">
        <a href="https://giaiphapweb.vn/thiet-ke-web/">Thiết kế website</a> bởi <a href="https://giaiphapweb.vn">GiaiPhapWeb.vn</a>
      </p>
    </div>
  </div>
</section>