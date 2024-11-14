<?php
/**
 * Template Name: Home Page
 *
 * The template for displaying the homepage
 *
 * @package wyperformance
 */

get_header();
?>

	<section id="primary">

		<main id="main">

			<section id="hero" class="relative min-h-[60vh] md:min-h-[80vh] flex items-center justify-center">

				<div class="relative isolate px-6 pt-14 lg:px-8">
					<div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
						<div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#f6b933] to-[#54c4f4] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
					</div>
					
					<div class="container px-4 max-w-screen-lg">
						<div class="text-center">
							<h1 class="text-balance text-4xl lg:text-5xl font-bold text-gray-900">We bring you THE Digital Agency for B2B & B2C Brands.</h1>
							<p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Our purpose was to do performance marketing, providing integrated data-driven digital marketing solutions and achieving high return on investment for our clients budget.</p>
							<div class="mt-10 flex items-center justify-center">
								<a href="#" class="rounded-md bg-[#f6b933] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#54c4f4] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#54c4f4]">Get started</a>
							</div>
						</div>
					</div>
					<div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
						<div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#54c4f4] to-[#f6b933] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
					</div>
				</div>

			</section>

			<section class="bg-white py-16 space-y-16">
				<?php
				the_content();
				?>
			</section>

			<?php if ( have_posts() ) {

				while ( have_posts() ) {
					the_post();
				}

			}
			?>

		</main>
	</section>

<?php
get_footer();
