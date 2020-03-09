<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
}
add_action( 'pre_get_posts', 'extraire_cours' );
function extraire_cours( $query ) {
    if ($query->is_category('evenement'))
    {
       $query->set( 'posts_per_page', -1 );
       $query->set( 'orderby', 'date' );
       $query->set( 'order', 'ASC' );
    }

    if ($query->is_category('atelier'))
    {
       $query->set( 'posts_per_page', 16 );
       $query->set( 'orderby', 'post_name' );
       $query->set( 'order', 'ASC' );
    }

 }