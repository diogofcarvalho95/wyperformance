<?php
/**
 * The template for displaying eventos pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wyperformance
 */

get_header();
?>

<section id="primary" class="py-16">
		<main id="main">
			<?php echo get_template_part('template-parts/eventos');?>
		</main>
	</section>

<?php
get_footer();
