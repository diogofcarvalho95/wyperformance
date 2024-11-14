<?php
/**
 * Template Name: Blog Page
 *
 * The template for displaying all posts on a specific page.
 *
 * @package wyperformance
 */

get_header();
?>

	<section id="primary" class="py-16">
		<main id="main">
			<?php echo get_template_part('template-parts/posts');?>
		</main>
	</section>

<?php
get_footer();
