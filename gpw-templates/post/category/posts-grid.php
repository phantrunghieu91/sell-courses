<?php 
/**
 * @author Hieu "Jin" Phan Trung
 * * Template: Post category page - Posts grid block
 */
global $wp_query;
$totalPages = $wp_query->max_num_pages;
$paged      = get_query_var( 'paged', 1 );
?>

<?php if( have_posts() ) : ?>

  <div class="posts-content__posts">

  <?php
  echo '<div class="posts-content__posts-grid">';
  while( have_posts() ) {
    the_post();
    get_template_part( 'gpw-templates/post/post-card' );
  }
  wp_reset_postdata();
  echo '</div>';

  if( $totalPages > 1) {
    echo '<div class="jins-page-pagination">';
    echo paginate_links( [
      'prev_text' => '<span class="material-symbols-outlined">arrow_back</span>',
      'next_text' => '<span class="material-symbols-outlined">arrow_forward</span>',
      'format'    => '?paged=%#%',
      'current'   => max( $paged, 1 ),
      'total'     => $totalPages,
      'end_size'  => 2,
    ] );
    echo '</div>';
  }

  ?>

  </div>

<?php else : ?>

  <p class="no-post-found"><?= __( 'Không tìm thấy bài viết nào!', 'gpw' ) ?></p>

<?php endif ?>