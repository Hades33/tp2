<?php /*Template name: nouvelle */

get_header();
?>

    <?php
echo '<h2>' . category_description( get_category_by_slug( 'nouvelle' )) . '</h2>';
while ( have_posts() ) :
    the_post();

    
    echo '<div class="conference">';
    echo '<h4>' . get_the_title() . '</h4>'; 
    echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>';
    echo '<input type="button" id="' . get_the_ID() . '" value="lire la suite ...">';
    the_post_thumbnail("thumbnail");
    echo '<div data-id="' . get_the_ID() . '" ></div>';

    echo '</div>';

endwhile; // End of the loop.
 echo '</div>';       
?>


<?php

get_footer();
?>