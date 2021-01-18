<?php

/**
 * Template part for displaying products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Steffen_Sten
 */

?>
<section class="relative px-4 pt-16 pb-20 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8 bg-gray-50">
	<div class="relative mx-auto max-w-7xl">
		<div class="flex flex-wrap w-full mb-20">
			<div class="w-full mb-6 lg:w-1/2 lg:mb-0">
				<h1 class="mt-2 text-4xl font-light leading-10 tracking-tight uppercase text-brand-700 sm:text-5xl sm:leading-none md:text-6xl"><?php the_title(); ?></h1>
			</div>
			<p class="w-full text-base leading-relaxed lg:w-1/2"><?= get_field('description'); ?></p>
		</div>
	</div>

	<div class="relative grid grid-cols-3 gap-32 mx-auto max-w-7xl">

		<div class="col-span-2 ">
			<?php // steffensten_post_thumbnail(); 
			?>
			<div class="mt-4 prose-sm prose sm:prose lg:prose-lg xl:prose-2xl">
				<?php the_content(); ?>
			</div>
		</div>

		<div class="col-span-1">

			<?php if (get_field('arkitekt') || get_field('udforende') || get_field('udfort_ar')) : ?>
				<h2 class="max-w-6xl mx-auto text-lg font-bold leading-6 text-gray-900 ">Fakta</h2>
				<div class="mt-2 overflow-hidden bg-white rounded-lg shadow-lg">
					<dl>
						<?php if (get_field('arkitekt')) { ?>
							<dt class="px-4 pt-4 text-sm font-medium leading-5 truncate text-brand-500">
								Arkitekt
							</dt>
							<dd>
								<div class="px-4 pb-4 text-lg font-medium leading-7 border-b border-gray-100 text-brand-900">
									<?= get_field('arkitekt'); ?>
								</div>
							</dd>
						<?php }
						if (get_field('udforende')) { ?>
							<dt class="px-4 mt-4 text-sm font-medium leading-5 truncate text-brand-500">
								Udførende
							</dt>
							<dd>
								<div class="px-4 pb-4 text-lg font-medium leading-7 border-b border-gray-100 text-brand-900">
									<?= get_field('udforende'); ?>
								</div>
							</dd>
						<?php }
						if (get_field('udfort_ar')) { ?>
							<dt class="px-4 mt-4 text-sm font-medium leading-5 truncate text-brand-500">
								Udført
							</dt>
							<dd>
								<div class="px-4 pb-4 text-lg font-medium leading-7 text-brand-900">
									<?= get_field('udfort_ar'); ?>
								</div>
							</dd>
						<?php } ?>
				</div>
			<?php endif; ?>

			<?php // Relaterede produkter
			$used_products = get_field('used_products');
			if ($used_products) : ?>
				<h2 class="max-w-6xl mx-auto mt-8 text-lg font-bold leading-6 text-gray-900">Anvendte produkter</h2>

				<div class="py-2 mt-2 overflow-hidden bg-white shadow-lg sm:rounded-md">
					<ul>
						<?php foreach ($used_products as $post) :

							// Setup this post for WP functions (variable must be named $post).
							setup_postdata($post); ?>
							<li>
								<a href="<?php the_permalink(); ?>" class="block transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
									<div class="flex items-center px-4 py-4 sm:px-6">
										<div class="flex items-center flex-1 min-w-0">
											<?php the_post_thumbnail('icon', ['class' => 'w-12 h-12 rounded overflow-hidden', 'title' => 'Billede af' . get_the_title()]); ?>
											<div class="ml-4">
												<div class="text-sm font-medium leading-5 truncate text-brand-600"><?php the_title(); ?></div>
												<div class="flex items-center mt-2 text-sm leading-5 text-gray-500">
													Kategori
												</div>
											</div>
										</div>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>


			<?php endif; ?>

			<?php // Relaterede produkter 
			?>
		</div>
	</div>

	<div class="relative mx-auto max-w-7xl">
		<?php include get_template_directory() . '/components/gallery.php' ?>
	</div>
</section>