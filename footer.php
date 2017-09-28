<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A_Letter_to_Elise
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer grid-container" role="contentinfo">
		<div class="site-info">
			Copyright &copy; <?php echo date("Y"); ?>

			<?php	// check to see if the company name exists and add it to the page
			if ( get_theme_mod( 'alte_company_name' ) ) : ?>
			<?php echo get_theme_mod( 'alte_company_name' ); ?>
			<?php endif; ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
