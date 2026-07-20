<?php
/**
 * @author Hieu "Jin" Phan Trung
 * * The template for displaying the footer.
 */
?>

</main>

<footer id="footer" class="footer pile">

	<div class="bg-box"></div>

	<div class="footer__inner">
		<?php get_template_part( 'gpw-templates/footer/main-section' ) ?>
		
		<?php get_template_part( 'gpw-templates/footer/bottom-section' ) ?>
	</div>

	<?php
    if ( get_theme_mod( 'back_to_top', 1 ) ) {
      get_template_part( 'template-parts/footer/back-to-top' );
    }
?>

</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>