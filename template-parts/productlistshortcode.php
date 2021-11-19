<?php
            // The Query
            $query = new WP_Query(array('post_type' => 'product'));
            query_posts( $query );

            // The Loop
            while ( $query->have_posts() ) : $query->the_post();  ?>
            
            <div class="col-md-4">
              <div class="f-page-products-item">
                <a href="<?php the_permalink();?>">
                  <figure>
                    <?php the_post_thumbnail('img-responsive')?>
                    <figcaption>
                      <b><?php the_title()?></b>
                      <p>
                      <?php
                $entries = get_post_meta( get_the_ID(), 'productinfolistgroup', true );
                
                foreach ((array) $entries as $key => $entry ) {
                    
                    if ( isset( $entry['name'] ) ) { 
                        echo $entry['name'].' '  ;     
                    } 
                
                    }?>
                      </p>
                     </figcaption>
                  </figure>
                </a>
              </div>
            </div>
        <?php  endwhile;

            // Reset Query
            wp_reset_query();
            ?>
       