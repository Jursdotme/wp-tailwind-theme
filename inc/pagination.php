<?php 

function post_pagination() {
 
  if( is_singular() )
      return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }

  echo '<nav class="flex items-center justify-between px-4 mt-16 border-t border-gray-200 sm:px-0">' . "\n";


  ?>

  <div class="flex flex-1 w-0">
    <a href="<?php previous_posts(); ?>" class="inline-flex items-center pt-4 pr-1 -mt-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-400">
      <!-- Heroicon name: arrow-narrow-left -->
      <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
      </svg>
      Forrige
    </a>
  </div>
  <div class="hidden md:flex">
  <?php 

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 transition duration-150 ease-in-out border-t-2 text-brand-600 border-brand-500 focus:outline-none focus:text-brand-800 focus:border-brand-700"' : 'class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-400"';

      printf( '<a %s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

      if ( ! in_array( 2, $links ) )
      echo '<span class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 text-gray-500 border-t-2 border-transparent">
      ...
    </span>' . "\n";
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 transition duration-150 ease-in-out border-t-2 text-brand-600 border-brand-500 focus:outline-none focus:text-brand-800 focus:border-brand-700"' : 'class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-400"';
      printf( '<a %s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<span class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 text-gray-500 border-t-2 border-transparent">
          ...
        </span>' . "\n";

      $class = $paged == $max ? ' class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 transition duration-150 ease-in-out border-t-2 text-brand-600 border-brand-500 focus:outline-none focus:text-brand-800 focus:border-brand-700"' : 'class="inline-flex items-center px-4 pt-4 -mt-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-400"';
      printf( '<a %s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  ?>

  </div>
  <div class="flex justify-end flex-1 w-0">
    <a href="<?php next_posts(); ?>" class="inline-flex items-center pt-4 pl-1 -mt-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-400">
      Næste
      <!-- Heroicon name: arrow-narrow-right -->
      <svg class="w-5 h-5 ml-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </a>
  </div>
</div>

</nav>

<?php 
}

?>
