<?php

/**
 * The template for displaying Reference archive pages	
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Steffen_Sten
 */



get_header();
?>

<main  class="px-4 mx-auto site-main max-w-7xl sm:px-6 lg:px-8" id="referencevue">

		<header class="page-header">
			<div class="py-16 sm:py-24 lg:flex lg:justify-between">
				<div class="max-w-xl">
					<h2 class="mt-2 text-4xl font-light leading-10 tracking-tight uppercase text-brand-700 sm:text-5xl sm:leading-none md:text-6xl">Referencer</h2>
					<p class="mt-5 text-xl leading-7 text-gray-500">Curabitur turpis nunc, commodo vitae malesuada nec, euismod eu dolor. Nam elementum ornare velit eget scelerisque. Nunc eros libero, vehicula sed diam at, dictum vehicula eros. Aenean at rhoncus elit. Vestibulum luctus urna tortor, at vehicula tortor malesuada eu.</p>
				</div>
			</div>
		</header><!-- .page-header -->
		
		<div class="flex items-center">

			<div is="filter-toggle" inline-template v-for="color in colorList" :key="color.id" :name="color.name">
				<div>
					<!-- On: "bg-indigo-600", Off: "bg-gray-200" -->
					<button @click="active = !active; $emit(name)" type="button" aria-pressed="false" aria-labelledby="toggleLabel" :class="[active ? bgActiveClass : bgInactiveClass]" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out bg-gray-200 border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						<span class="sr-only">Use setting</span>
						<!-- On: "translate-x-5", Off: "translate-x-0" -->
						<span aria-hidden="true" :class="[active ? sliderActiveClass : sliderInactiveClass]" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-0 bg-white rounded-full shadow ring-0"></span>
					</button>
					<span class="ml-3" id="toggleLabel">
						<span class="text-sm font-medium text-gray-900">{{name}}</span>
					</span>
				</div>
			</div>
			
		</div >

		<div  class="grid max-w-lg gap-5 mx-auto mt-12 lg:grid-cols-3 lg:max-w-none">

			<article v-for="item in items" :key="item.id"  id="post-" class="flex flex-col overflow-hidden rounded-lg shadow-lg" >

				<a :href="item.link">
					<img :src="item.image" class="object-cover w-full h-64" alt="">
				</a>

				<div class="mx-4 my-4">
					<h3 class="mb-1 text-xs font-semibold tracking-widest uppercase text-brand-500 title-font">Kategori</h3>
					<h2 class="text-xl font-semibold leading-7 text-brand-900"><a href="#" rel="bookmark">{{item.title}}</a></h2>
				</div>
			</article>


		</div>
		

</main><!-- #main -->


<?php
get_footer();
