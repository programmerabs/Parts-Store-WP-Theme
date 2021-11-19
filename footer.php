<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Parts_Store
 */

?>

	<footer class="site-footer">
	<div class="container">
		<div class="footer-top">
			
				<div class="row">
					<div class="col-md-3">
						<?php echo dynamic_sidebar('footer-w-1')?>
					</div>
					<div class="col-md-6">
						<?php echo dynamic_sidebar('footer-w-2')?>
					</div>
					<div class="col-md-3">
						<?php echo dynamic_sidebar('footer-w-3')?>
					</div>
				</div>
			</div>
		
		<div class="footer-bottom">
			<a style="text-decoration: none;color:#fff" href="<?php echo esc_url( __( 'https://techdsf.com/', 'parts-store' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'copyright &copy; 2021 123.com', 'parts-store' ) );
				?>
			</a>
			<span class="sep"> | </span>
				<span style="margin-right: auto ;">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Develop by Techdsf', 'parts-store' ) );
				?></span>
		</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
