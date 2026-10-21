<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cube_travel
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div id="footer-widgets" class="container">
				<?php get_template_part( 'inc/footer', 'widgets' ); ?>
			</div><!-- .container -->
		<?php endif; ?>

		<div class="site-info">
			<div class="container">
				<?php
				$cube_travel_copyright_text = sprintf(
					/* translators: %s: Theme author link. */
					__( 'Theme Cube Travel by %s', 'cube-travel' ),
					'<a target="_blank" rel="designer noopener noreferrer" href="' . esc_url( 'https://kantipurthemes.com/' ) . '">' .
					esc_html__( 'Kantipur Themes', 'cube-travel' ) .
					'</a>'
				);

				echo wp_kses_post( $cube_travel_copyright_text );
				?>
			</div><!-- .container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<a href="#page" class="to-top"></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>