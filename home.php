<?php 
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Blogs page template
 */
get_template_part( 'gpw-templates/global/header' );

get_template_part( 'gpw-templates/global/hero-section', null, [ 'display_breadcrumbs' => true ] );

get_template_part( 'gpw-templates/post/category/content' );

get_template_part( 'gpw-templates/global/footer' );