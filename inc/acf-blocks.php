<?php
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

  // Check function exists.
  if (function_exists('acf_register_block_type')) {

    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'ss_content_switch',
      'title'             => __('Indhold med skifter'),
      'description'       => __('Skift imellem 2 indholdsblokke.'),
      'render_template'   => 'template-parts/blocks/ss_content_switch/ss_content_switch.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'keywords'          => array('swtitch', 'toggle'),
    ));
  }
}
