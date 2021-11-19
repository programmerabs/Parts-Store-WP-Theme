
 <?php
/**
 * Template Name: Homepage Template
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
<section id="plist">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <h1 style="text-align: center;">Unsere Produkt
</h1>
            </div>
            <?php echo do_shortcode("[pa_products_list]"); ?>

        </div>
    </div>
</section>
<section id="fpagesupplier">
    <div class="container">
        <div class="row">
        <div class="col-md-12 p-5">
                <h1 style="text-align: center;">Supplier
</h1>
            </div>
            <div class="col-md-12">
                <?php echo do_shortcode("[pa_supplier_list]")?>
            </div>
        </div>
    </div>

</section>
<div class="container">
 
		<main id="primary" class="site-main">





</main>
		 
<!-- #main -->


</div>
<?php
get_footer();
