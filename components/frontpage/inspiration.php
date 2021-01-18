<?php
//Setup 
$inspiration = get_field('inspiration_featured_references');

$sizes = [1, 1, 2, 2, 1, 1];

if ($inspiration) : ?>
  <div class="px-4 pt-16 pb-20 mx-auto sm:px-8 lg:pt-24 lg:pb-28 xl:px-0 max-w-7xl">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
      <h2 class="col-span-1 text-4xl font-light leading-tight uppercase text-brand-700">
        Find inspiration i vores Projekter
      </h2>
      <p class="col-span-2 text-lg text-gray-500">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,
        purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor
        rhoncus dolor purus non enim praesent elementum facilisis leo, vel
        fringilla est ullamcorper eget nulla
      </p>
    </div>
    <div class="grid grid-cols-1 grid-rows-3 gap-8 mt-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

      <?php
      $index = 0;
      foreach ($inspiration as $post) :
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);

        $classes = ($index == 2 || $index == 3) ? 'col-span-1 lg:col-span-2 row-span-1 lg:row-span-2 h-64 lg:h-136' : 'col-span-1 row-span-1 h-64';
        $image_size = ($index == 2 || $index == 3) ? 'medium' : 'thumbnail';

      ?>

        <a href="<?= get_permalink(); ?>" title="Bliv inspireret af <?php the_title(); ?>" class="relative block bg-cover rounded-lg shadow-lg hover:shadow-xl <?= $classes; ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), $image_size); ?>);">
          <span class="absolute bottom-1.5 right-1.5 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-brand-200 text-brand-700"><?php the_title(); ?></span>
        </a>

      <?php
        $index++;
      endforeach; ?>
    </div>
  </div>
  <?php
  // Reset the global post object so that the rest of the page works correctly.
  wp_reset_postdata(); ?>
<?php endif; ?>