<?php
function custom_posts_per_page($query) {
  if ($query->is_post_type_archive('reference') && $query->is_main_query()) {
    $query->set('posts_per_page', '-1');
  }
}
add_action('pre_get_posts', 'custom_posts_per_page');
