<?php /*Template name: atelier */

get_header();
?>
<div id="primary" class="content-area">
<main id="main" class="site-main">
    <?php

echo '<h2>' . category_description( get_category_by_slug( 'atelier' )) . '</h2>';
echo '<div class="gridAtelier" style="background-color:white; color:grey;">';
while ( have_posts() ) :
    the_post();

    

    echo '<div class="gridInterieur">';
    echo '<div style=>' . get_the_title() . '</div><div>'. get_post_field('post_name') . '</div><div>'. get_the_author_meta('display_name') . '</div>';
    echo '</div>';

endwhile; // End of the loop.
 echo '</div>';       
?>
</main>
</div>

<?php

get_footer();
?>