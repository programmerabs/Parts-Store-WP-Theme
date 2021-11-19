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
	<div class="row">
		<div class="col-md-8">
		<main id="primary" class="site-main">


        <?php
// The Query
$query = new WP_Query(array('post_type' => 'product'));
query_posts( $query );

// The Loop
while ( $query->have_posts() ) : $query->the_post();  
    the_post_thumbnail();
endwhile;

// Reset Query
wp_reset_query();
?>

</main>
		</div>
		<div class="col-md-4">
		<?php
get_sidebar();
?>
		</div>
	</div>
<!-- #main -->


</div>
<?php
get_footer();
