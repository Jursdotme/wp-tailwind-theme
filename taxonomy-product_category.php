<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Steffen_Sten
 */

get_header();
?>

	<main id="primary" class="px-4 mx-auto site-main max-w-7xl sm:px-6 lg:px-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="py-16 sm:py-24 lg:flex lg:justify-between">
					<div class="max-w-xl">
						<h2 class="mt-2 text-4xl font-light leading-10 tracking-tight uppercase text-brand-700 sm:text-5xl sm:leading-none md:text-6xl"><?php single_term_title(); ?></h2>
						<p class="mt-5 text-xl leading-7 text-gray-500"><?php echo term_description(); ?></p>
					</div>
				</div>
			</header><!-- .page-header -->

			<div class="grid max-w-lg gap-5 mx-auto mt-12 lg:grid-cols-3 lg:max-w-none">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/loop', get_post_type() );

			endwhile;
			?>
			
			</div>

			<?php
			post_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
