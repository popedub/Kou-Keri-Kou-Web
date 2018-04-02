<?php

function my_home_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '8' );//cat 9 es el featured y cat 8 so 4 destacados
        $query->set( 'posts_per_page', 5 );
    }
}
add_action( 'pre_get_posts', 'my_home_category' );
?>
