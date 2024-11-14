<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wyperformance
 */

get_header();
$search_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : 'all';
?>

	<section id="primary" class="py-16">
		<main id="main">
			<?php 
			if ($search_type === 'evento') : 
				echo get_template_part('template-parts/eventos');
			else:
				echo get_template_part('template-parts/posts');
			endif;
			?>
		</main>
	</section>

<?php
get_footer();
