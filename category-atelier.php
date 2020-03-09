<?php /*Template name: atelier */

get_header();
?>
<div id="primary" class="content-area">
<main id="main" class="site-main">
    <?php

echo '<h2>' . category_description( get_category_by_slug( 'atelier' )) . '</h2>';
    
echo '<ol>';
while ( have_posts() ) :
    the_post();
    echo '<li style="color:grey;"> <a style="color:grey">' . get_the_title() . '__________</a><a style="color:red;">' . get_post_field('post_name') . '</a><a>_________ ' . get_the_author_meta('display_name') . '</a>' . '</li>';
endwhile; // End of the loop.
 echo '</ol>';       
?>
</main>
</div>

<?php

get_footer();
?>