<?php /*Template name: atelier */

get_header();
?>
<div id="primary" class="content-area">
<main id="main" class="site-main">
    <?php
    
echo '<ol>';
while ( have_posts() ) :
    the_post();
    echo '<li>' . get_the_title() . '</li>';
endwhile; // End of the loop.
 echo '</ol>';       
?>
</main>
</div>

<?php

get_footer();
?>