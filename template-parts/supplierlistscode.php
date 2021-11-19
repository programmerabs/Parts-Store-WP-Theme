<ul class="supplier-logo">
<?php
    // The Query
    $query = new WP_Query(array('post_type' => 'supplier'));
    query_posts( $query );

    // The Loop
    while ( $query->have_posts() ) : $query->the_post();  ?>
            <li>
                <?php the_post_thumbnail('img-responsive');?>
            </li>
<?php  endwhile;

    // Reset Query
    wp_reset_query();
    ?>
     </ul>