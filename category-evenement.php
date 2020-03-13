<?php /*Template name: content-evenement */

get_header();
?>
<div id="primary" class="content-area">
<main id="main" class="site-main">
    <?php
    echo '<div class="oGrid" style="background-color:white;">';


while ( have_posts() ) :
    the_post();
    $mois = (int)get_the_date('m');
    $mois = ($mois % 3) + 1;
  
    $jour = (int)get_the_date('j'); 


    $gridArea = $jour . '/' . $mois;

    echo $gridArea;
    echo '<div>';
    echo '<a href="'. get_permalink().'"><p>' . get_the_title() .' ' . $gridArea.' ' . get_the_date('j-m-Y') .'</p></a>';
    echo '</div>';
    //echo '<h4 style="grid-area:'. $gridArea .'">' . get_the_title() .  get_the_ID() . get_the_date('Y-m-d') . '</h4>'; 



endwhile; // End of the loop.

echo '</div>'
?>
</main>
</div>

<?php

get_footer();
?>