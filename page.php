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
 
		<main id="primary" class="site-main">



<?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', 'page' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>

</main>
		 
<!-- #main -->


</div>
<?php
get_footer();
