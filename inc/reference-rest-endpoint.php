<?php
/**
 * Create Custom Rest API Route
 **/
add_action('rest_api_init', 'register_reffilter_route');

function register_reffilter_route() {
  register_rest_route('reffilter', 'refs', array(
    'methods' => 'GET',
    'callback' => 'reffilter_callback',
  ));
}

function reffilter_callback() {

  $output_json = array();


  // WP_Query arguments
  $args = array(
    'post_type'              => array('reference'),
    'posts_per_page'         => '-1',
    // 'orderby' => 'title'
  );

  // The Query
  $query = new WP_Query($args);

  // The Loop
  if ($query->have_posts()) {

    while ($query->have_posts()) {
      $query->the_post();
      // do something

      $color_terms = get_the_terms(get_the_id(), 'reference_colors');
      $colors = [];
      foreach ($color_terms as $term_obj) {
        $colors[] = array(
          'name' => $term_obj->name,
          'id' => $term_obj->term_id,
          'slug' => $term_obj->slug 
        );
      }

      $id = get_the_id();
      $image = get_the_post_thumbnail_url($id, 'thumbnail');
      // $size = 'thumbnail';
      // $thumb = $image['sizes'][$size];


      $item['id'] = $id;
      $item['title'] = get_the_title();
      $item['image'] = $image;
      $item['link'] = get_the_permalink();
      $item['colors'] = $colors;

      $output_json[] = $item;
    }
  } else {
    // no posts found
  }

  // Restore original Post Data
  wp_reset_postdata();

  return array_reverse($output_json);
}
