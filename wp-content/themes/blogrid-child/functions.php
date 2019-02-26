<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
}

function exercise_post_type() {
    $labels = array(
            'name' => 'Exercise',
            'singular_name' => 'Exercise',
            'add_new' => 'Add Exercise',
            'all_items' => 'All Exercises',
            'add_new_item' => 'Add Exercise',
            'edit_item' => 'Edit Exercise',
            'new_item' => 'New Exercise',
            'view_item' => 'View Exercise',
            'search_item' => 'Search Exercise',
            'not_found' => 'No Exercises found',
            'not_found_in_trash' => 'No Exercise found in trash',
            'parent_item_colon' => 'Parent Exercise'
    );
    $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'revisions'),
            'taxonomies' => array('category', 'post_tag'),
            'menu_position' => 2,
            'exclude_from_search' => false,
    );
    register_post_type('ex', $args);
}
add_action('init', 'exercise_post_type');

?>