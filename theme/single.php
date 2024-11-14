<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wyperformance
 */

get_header();
?>

	<section id="primary" class="py-16 min-h-[80vh]">
		<main id="main" class="container px-4 max-w-screen-lg prose">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				echo '<h1 class="font-bold text-3xl lg:text-4xl tracking-tight text-gray-900">'.get_the_title().'</h1>';

				if(has_post_thumbnail(get_the_ID())):
					echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'rounded-lg max-w-full w-full border-gray-500 overflow-hidden' ) );
				endif;
				
				the_content();
				// End the loop.
			endwhile;
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
