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
 * @package Parts_Store
 */

get_header();
?>
<section id="pa-page-head" style="background: url(<?php if(get_header_image()){
		header_image();
	}else{
		echo 'http://localhost/wp/pa/wp-content/uploads/2021/11/top.jpg';
	}  ?>);">
<div class="contaienr">
	<div class="row">
		<div class="col-md-12">
			<h1><?php the_title();?></h1>
		</div>
	</div>
</div>
</section>
<div class="container">
 
		<main id="primary" class="site-main pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="img-box mb-3">
                        <?php

                            the_post_thumbnail();
                        ?>
                        </div>
                   
                    <!-- <div class="p-content ps-3"> -->
                    <!-- <?php the_content();?> -->
                    <!-- </div> -->
                    <div class="pinfolist   p-3">
                        <div class="row">
                            <?php 
                        $entries = get_post_meta( get_the_ID(), 'productinfolistgroup', true );
                        
                        foreach ($entries as $key => $entry ) {
                        
                            if ( isset( $entry['name'] ) ) {?>
                            <div class="col-sm-6">
                                <?php
                                echo  '<p><img class="iconboximg" src="'.get_template_directory_uri().'/assets/img/check.png">'.$entry['name'].'</p>' ;
                                ?>
                            </div>
                                <?php
                            }else{
                                echo '';
                            }
                        
                        }
                        
                        ?>
                            
                        </div>
                        
                        </div>
                        <div id="supplierr">
                            <h1>Suppliers</h1>
                            <div class="row">

                                <?php
                            // The Query
                            $query = new WP_Query(array('post_type' => 'supplier'));
                            query_posts( $query );

                            // The Loop
                            while ( $query->have_posts() ) : $query->the_post();  ?>
                            <div class="col-sm-6 col-md-4 ">
                                    <div class="sllboximg">
                                    <?php the_post_thumbnail();?>
                                    </div>
                            </div>
                        <?php  endwhile;

                            // Reset Query
                            wp_reset_query();
                            ?>
     
                        </div>
                              
 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fmtitle">
                        <h3>WIR RUFEN SIE AN</h3>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="106" title="WIR RUFEN SIE AN"]');?>
                    </div>
                </div>
            </div>
     
 


</main>
		</div>
 
<?php
get_footer();
