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
	<div class="relative grid grid-cols-3 gap-16 mx-auto max-w-7xl">
		<div class="col-span-2">
			<div class="w-full mb-6 lg:w-1/2 lg:mb-0">
				<h1 class="mt-2 text-4xl font-light leading-10 tracking-tight uppercase text-brand-700 sm:text-5xl sm:leading-none md:text-6xl"><?php the_title(); ?></h1>
			</div>
			<p class="mt-8 text-xl leading-relaxed max-w-prose "><?= get_field('description'); ?></p>
			<div class="relative w-full mt-8">
				<div class="overflow-hidden bg-white shadow-lg sm:rounded-lg ">
					<div class="px-4 py-5 border-b border-gray-200 sm:px-6">
						<h3 class="text-lg font-medium leading-6 text-gray-900">
							Produktspecifikationer
						</h3>
						<p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
							Information, specifikationer og datablade for <?php the_title(); ?>.
						</p>
					</div>
					<div class="px-4 py-5 sm:p-0">
						<dl>

							<?php if (have_rows('specs')) : ?>
								<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
									<?php while (have_rows('specs')) : the_row(); ?>
										<dt class="text-sm font-medium leading-5 text-gray-500">
											<?= get_sub_field('label'); ?>
										</dt>
										<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
											<?= get_sub_field('value'); ?>
										</dd>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>

							<div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
								<dt class="text-sm font-medium leading-5 text-gray-500">
									Downloads
								</dt>
								<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
									<ul class="border border-gray-200 rounded-md">
										<li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm leading-5">
											<div class="flex items-center flex-1 w-0">
												<!-- Heroicon name: paper-clip -->
												<svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
												</svg>
												<span class="flex-1 w-0 ml-2 truncate">
													datablad.pdf
												</span>
											</div>
											<div class="flex-shrink-0 ml-4">
												<a href="#" class="font-medium transition duration-150 ease-in-out text-brand-600 hover:text-brand-500">
													Download
												</a>
											</div>
										</li>
										<li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm leading-5 border-t border-gray-200">
											<div class="flex items-center flex-1 w-0">
												<!-- Heroicon name: paper-clip -->
												<svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
												</svg>
												<span class="flex-1 w-0 ml-2 truncate">
													læggevejledning.pdf
												</span>
											</div>
											<div class="flex-shrink-0 ml-4">
												<a href="#" class="font-medium transition duration-150 ease-in-out text-brand-600 hover:text-brand-500">
													Download
												</a>
											</div>
										</li>
									</ul>
								</dd>
							</div>
						</dl>
					</div>
				</div>
			</div>
		</div>
		<div class="col-span-1">
			<?php the_post_thumbnail('large', ['class' => 'h-full w-full object-cover rounded shadow-xl', 'title' => 'Billede af ' . get_the_title()]); ?>
		</div>
	</div>


	<!--
		Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
		Read the documentation to get started: https://tailwindui.com/documentation
	-->


	<?php

	/*
	*  Query posts for a relationship value.
	*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
	*/

	$references = get_posts(array(
		'post_type' => 'reference',
		'meta_query' => array(
			array(
				'key' => 'used_products', // name of custom field
				'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		)
	));

	?>
	<?php if ($references) : ?>
		<ul>
			<?php foreach ($references as $reference) : ?>
				<?php

				$photo = get_field('photo', $reference->ID);

				?>
				<li>
					<a href="<?php echo get_permalink($reference->ID); ?>">
						<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" width="30" />
						<?php echo get_the_title($reference->ID); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<div class="relative mx-auto max-w-7xl">
		<?php include get_template_directory() . '/components/gallery.php' ?>
	</div>
</section>