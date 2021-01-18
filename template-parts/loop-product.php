<?php
/**
 * Template part for displaying products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Steffen_Sten
 */

?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('flex flex-col overflow-hidden rounded-lg shadow-lg'); ?>>

    <a href="<?= get_the_permalink(); ?>">
    <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'w-full h-64 object-cover' ) ); ?>
    </a>

    <div class="mx-4 my-4">
      <h3 class="mb-1 text-xs font-semibold tracking-widest uppercase text-brand-500 title-font">Kategori</h3>
      <?php the_title( '<h2 class="text-xl font-semibold leading-7 text-brand-900"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    </div>
  </article>
