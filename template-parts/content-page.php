<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Steffen_Sten
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

	<header class="relative mx-auto mt-16 lg:text-lg xl:text-2xl max-w-prose sm:mt-24">
		<h1 class="mt-2 text-4xl font-light leading-10 tracking-tight uppercase text-brand-700 sm:text-5xl sm:leading-none md:text-6xl"><?php the_title(); ?></h1>
	</header>

	<div class="mx-auto mt-4 prose-sm prose md:mt-8 entry-content sm:prose lg:prose-lg xl:prose-2xl">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'steffensten'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->