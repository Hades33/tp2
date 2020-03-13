<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

// The Query
$args = array(
    "posts_per_page" => 3,
    "category_name" =>"nouvelle"
    
    //"orderby" => "date",
    //"order" => "ASC"
);



$query1 = new WP_Query( $args );


/* The 2nd Query (without global var) */
$args2 = array(
    "posts-per-page" => 3,
    "category_name" => "conference"
);


$query2 = new WP_Query( $args2 );

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <?php
        


		while ( have_posts() ) :
            the_post();

           // get_template_part( 'template-parts/content', 'page' );
            the_post_thumbnail('full');
           // echo get_the_title();

			// If comments are open or we have at least one comment, load up the comment template.
	

        endwhile; // End of the loop.
        

        echo '<h2>' . category_description( get_category_by_slug( 'nouvelle' )) . '</h2>';
        // The 2nd Loop
        // The Loop
    while ( $query1->have_posts() ) {
        $query1->the_post();
        echo '<div class="nouvelle">';
        echo '<h4>' . get_the_title() . '</h4>';
        echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>';
        the_post_thumbnail("thumbnail");
        echo '</div>';
    }
 
// Restore original Post Data
wp_reset_postdata();
        
        
 ///////////////////////////////////////////////Nouvelle
 echo '<h2>' . category_description( get_category_by_slug( 'conference' )) . '</h2>';
 while ( $query2->have_posts() ) {
    $query2->the_post();
    echo '<div class="conference">';
    echo '<h4>' . get_the_title() . ' ' . get_the_date('Y-m-d') . '</h4>'; 
    echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>';
    the_post_thumbnail("thumbnail");
    echo '</div>';
}



 
/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset with 
 * wp_reset_query(). We just need to set the post data back up with
 * wp_reset_postdata().
 */
wp_reset_postdata();
 
 


 
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
