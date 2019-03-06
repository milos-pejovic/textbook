<?php

// Move this function to functions.php if possible
function get_attachment_url_by_slug( $slug ) {
    $args = array(
      'post_type' => 'attachment',
      'name' => sanitize_title($slug),
      'posts_per_page' => 1,
    );
    $_header = get_posts( $args );
    $header = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_url($header->ID) : '';
}

get_header(); ?>

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">

                    <?php 
                    
//                    display_single_post(get_post()->ID);
                    display_single_post(136);
                    display_single_post(46);
                    display_single_post(216);
                    
                    ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
