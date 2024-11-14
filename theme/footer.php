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

	<footer id="colophon" class="bg-gray-100">

		<div class="container p-4 flex justify-between space-x-4 items-center">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img class="max-w-full w-40" src="<?php echo get_template_directory_uri(); ?>/img/logo-wyperformance-black.svg" alt="<?php bloginfo( 'name' ); ?>" loading="lazy" />
            </a>

			<p class="text-xs ext-gray-500">© 2024 Diogo Carvalho</p>

		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
