<?php /* Template Name: Kontaktside */

get_header();
?>

<main id="primary" class="site-main">

  <h1 class="sr-only">Kontakt Steffensten</h1>

  <div class="relative bg-gray-800">
    <div class="h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
      <?php
      $image = get_field('photo');
      if (!empty($image)) : ?>
        <img class="object-cover w-full h-full" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php endif; ?>
    </div>
    <div class="relative max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8 lg:py-16">
      <div class="md:ml-auto md:w-1/2 md:pl-10">
        <div class="text-base font-semibold leading-6 tracking-wider text-gray-300 uppercase">
          <?= get_field('heading_prefix'); ?>
        </div>
        <h2 class="mt-2 text-3xl font-extrabold leading-9 tracking-tight text-white sm:text-4xl sm:leading-10">
          <?= get_field('heading'); ?>
        </h2>
        <p class="mt-3 text-lg leading-7 text-gray-300">
          <?= get_field('description'); ?>
        </p>
        <div class="mt-8">
          <div class="inline-flex rounded-md shadow"><a href="<?= get_field('button_link'); ?>" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-600 focus:outline-none focus:shadow-outline">
              <?= get_field('button_label'); ?>
              <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 ml-3 -mr-1 text-gray-400">
                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
              </svg></a></div>
        </div>
      </div>
    </div>
  </div>


  <div class="bg-gray-50">
    <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="max-w-lg mx-auto md:max-w-none md:grid md:grid-cols-2 md:gap-8">
        <div>
          <h2 class="text-2xl font-extrabold leading-8 text-gray-900 sm:text-3xl sm:leading-9">
            Kontakt
          </h2>
          <div class="mt-3">
            <p class="text-lg leading-7 text-gray-500">
              Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.
            </p>
          </div>
          <div class="mt-9">
            <div class="flex">
              <div class="flex-shrink-0">

                <svg class="w-6 h-6 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <div class="ml-3 text-base leading-6 text-gray-500">
                <p class="font-semibold">
                  <?= get_field('company'); ?>
                </p>
                <p class="mt-1">
                  <?= get_field('adresse'); ?>
                </p>
              </div>
            </div>
            <div class="flex mt-6">
              <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div class="ml-3 text-base leading-6 text-gray-500">
                <p>
                  <?= get_field('main_email'); ?>
                </p>
              </div>
            </div>

            <div class="flex mt-6">
              <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
              </div>
              <div class="ml-3 text-base leading-6 text-gray-500">
                <p>
                  <?= get_field('main_phone'); ?>
                </p>
              </div>
            </div>
            <div class="flex mt-6">
              <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
              </div>
              <div class="ml-3 text-base leading-6 text-gray-500">
                <p>
                  <?= get_field('main_fax'); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-12 sm:mt-16 md:mt-0">
          <h2 class="text-2xl font-extrabold leading-8 text-gray-900 sm:text-3xl sm:leading-9">
            Åbningstider
          </h2>
          <div class="mt-3">
            <p class="text-lg leading-7 text-gray-500">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, repellat error corporis doloribus similique, voluptatibus numquam quam, quae officiis facilis.
            </p>
          </div>

          <?php if (have_rows('opening_hours')) : ?>
            <div class="mt-9">
              <h2 class="mb-2 text-sm font-semibold">Kontor</h2>
              <?php while (have_rows('opening_hours')) : the_row(); ?>

                <div class="grid grid-cols-2 text-base leading-6 text-gray-500">
                  <p>
                    <?= get_sub_field('beskrivelse') ?>
                  </p>
                  <p class="mt-1">
                    <?= get_sub_field('abningstid') ?>
                  </p>
                </div>

              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <?php if (have_rows('opening_hours_warehouse')) : ?>
            <div class="mt-9">
              <h2 class="mb-2 text-sm font-semibold">Lager</h2>
              <?php while (have_rows('opening_hours_warehouse')) : the_row(); ?>

                <div class="grid grid-cols-2 text-base leading-6 text-gray-500">
                  <p>
                    <?= get_sub_field('beskrivelse') ?>
                  </p>
                  <p class="mt-1">
                    <?= get_sub_field('abningstid') ?>
                  </p>
                </div>

              <?php endwhile; ?>
            </div>
          <?php endif; ?>







        </div>
      </div>
    </div>
  </div>



  <?php


  // If employees exist.
  if (have_rows('employees')) :  ?>

    <div class="bg-white">
      <div class="px-4 py-12 mx-auto lg:py-24 max-w-7xl sm:px-6 lg:px-8">
        <div class="space-y-12">
          <h2 class="text-3xl font-extrabold leading-9 tracking-tight sm:text-4xl">Find medarbejder</h2>
          <ul class="space-y-12 lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8 lg:gap-y-12 lg:space-y-0">

            <?php while (have_rows('employees')) : the_row(); // Loop through rows. 
            ?>

              <li>
                <div class="space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8">
                  <div class="relative h-0 pb-full sm:pt-1/2">
                    <?php
                    $photo = get_sub_field('photo');
                    if (!empty($photo)) : ?>
                      <img class="absolute inset-0 object-cover object-top w-full h-full rounded-lg shadow-lg sm:object-center" src="<?php echo esc_url($photo['sizes']['employee']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                    <?php endif; ?>
                  </div>
                  <div class="sm:col-span-2">
                    <div class="space-y-4">
                      <div class="space-y-1 text-lg font-medium leading-6">
                        <h4><?= get_sub_field('name'); ?></h4>
                        <p class="text-brand-600"><?= get_sub_field('title'); ?></p>
                      </div>
                      <div class="">
                        <div class="text-sm">
                          <a href="mailto:<?= get_sub_field('email'); ?>" class="flex items-center space-x-2">
                            <span>
                              <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                              </svg>
                            </span>
                            <span class="text-gray-600"><?= get_sub_field('email'); ?></span>
                          </a>
                          <a href="tel:<?= get_sub_field('phone'); ?>" class="flex items-center space-x-2">
                            <span>
                              <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                              </svg>
                            </span>
                            <span class="text-gray-600"><?= get_sub_field('phone'); ?></span>
                          </a>
                        </div>
                        <!-- <p class="mt-4 text-gray-500">Ultricies massa malesuada viverra cras lobortis. Tempor orci hac ligula dapibus mauris sit ut eu. Eget turpis urna maecenas cras. Nisl dictum.</p> -->
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>

          </ul>
        </div>
      </div>
    </div>

  <?php

  endif;

  ?>

</main><!-- #main -->

<?php
get_footer();
?>