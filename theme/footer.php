<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wyperformance
 */

?>

	</div><!-- #content -->

	<footer id="colophon">

		<div>
			<?php
			$wyperformance_blog_info = get_bloginfo( 'name' );
			if ( ! empty( $wyperformance_blog_info ) ) :
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
				<?php
			endif;

			/* translators: 1: WordPress link, 2: WordPress. */
			printf(
				'<a href="%1$s">proudly powered by %2$s</a>.',
				esc_url( __( 'https://wordpress.org/', 'wyperformance' ) ),
				'WordPress'
			);
			?>
		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
