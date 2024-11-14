<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wyperformance
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page">

	<a href="#content" class="sr-only"><?php esc_html_e( 'Skip to content', 'wyperformance' ); ?></a>

	<header id="masthead" class="sticky shadow-xl z-50 bg-white">

		<div class="container p-4 flex justify-between items-center space-x-6 ">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="max-w-full w-40" src="<?php echo get_template_directory_uri(); ?>/img/logo-wyperformance-black.svg" alt="<?php bloginfo( 'name' ); ?>" loading="lazy" />
			</a>

			<nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'wyperformance' ); ?>">

				<button class="md:hidden" aria-controls="primary-menu" aria-expanded="false">
					<svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
				</button>

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
					)
				);
				?>
			</nav>

		</div>

	</header>

	<div id="content">
