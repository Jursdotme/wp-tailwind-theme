<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Steffen_Sten
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto'); ?>>
	<header>

		<div class="relative mx-auto max-w-7xl">
			<div class="flex flex-wrap w-full mb-20">
				<div class="w-full mb-6 lg:w-1/2 lg:mb-0">
					<?php
					if (is_singular()) :
						the_title('<h1 class="mt-2 text-4xl font-light leading-10 tracking-tight uppercase text-brand-700 sm:text-5xl sm:leading-none md:text-6xl">', '</h1>');
					else :
						the_title('<h2 class="mt-2 text-4xl font-light leading-10 tracking-tight uppercase text-brand-700 sm:text-5xl sm:leading-none md:text-6xl"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;

					if ('post' === get_post_type()) :
					?>
				</div>
				<div class="entry-meta">
					<p class="w-full text-base leading-relaxed lg:w-1/2">Something</p>

					<?php
						steffensten_posted_on();
						steffensten_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php steffensten_post_thumbnail(); ?>

	<div class="entry-content">
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

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'steffensten'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php steffensten_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->