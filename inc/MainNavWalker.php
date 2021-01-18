<?php
class Nav_Main_Walker extends Walker_Nav_Menu {


  function start_lvl(&$output, $depth = 0, $args = array()) {
  }

  function end_lvl(&$output, $depth = 0, $args = array()) {
    if ($depth == 0) {
      $output .= '</div></div></div></div></div>';
    }
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

    if (in_array("menu-item-has-children", $item->classes) && $depth == 0) { // Dropdown trigger

      $item_output = '<div class="relative" x-data="{ open: false }">';
      $item_output .= $args->before;
      $item_output .= '  <button @click="open = true" type="button" class="inline-flex items-center space-x-2 text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out group hover:text-gray-900 focus:outline-none focus:text-gray-900">';
      $item_output .= '<span>' . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
      $item_output .= '</span><svg class="w-5 h-5 text-gray-400 transition duration-150 ease-in-out group-hover:text-gray-500 group-focus:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>';
      $item_output .= '</button>';
      $item_output .= $args->after;




      if ($item->menu_type == 'simple') {
        $item_output .= '<div x-show="open"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-1"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 translate-y-1"

      @click.away="open = false" class="absolute w-screen max-w-xs px-2 mt-3 transform -translate-x-1/2 left-1/2 sm:px-0">
        <div class="rounded-lg shadow-lg">
          <div class="overflow-hidden rounded-lg shadow-xs">
            <div class="relative z-20 grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">';
      } elseif ($item->menu_type == 'advanced') {
        $item_output .= '<div x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        @click.away="open = false" class="absolute w-screen max-w-md mt-3 -ml-4 transform lg:max-w-3xl lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
          <div class="rounded-lg shadow-lg">
            <div class="overflow-hidden rounded-lg shadow-xs">
              <div class="relative z-20 grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8 lg:grid-cols-2">';
      }
    } elseif (!in_array("menu-item-has-children", $item->classes) && $depth == 0) { // No children (Simple menuitem)

      $indent = ($depth) ? str_repeat("\t", $depth) : '';

      $class_names = $value = '';

      $tailwind_classes = 'text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-gray-900 focus:outline-none focus:text-gray-900';

      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;
      $classes[] = $tailwind_classes;

      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
      $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';


      $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
      $id = $id ? ' id="' . esc_attr($id) . '"' : '';

      $output .= $indent . '';

      $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
      $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
      $attributes .= !empty($classes) ? $class_names : '';


      $item_output = $args->before;
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;
    } else {
      // Advanced Dropdown
      $indent = ($depth) ? str_repeat("\t", $depth) : '';

      $class_names = $value = '';

      $tailwind_classes = 'flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg hover:bg-gray-50';
      $tailwind_classes_wide = 'flow-root p-3 -m-3 space-y-1 transition duration-150 ease-in-out rounded-md hover:bg-gray-100';

      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;

      if ($item->wide == true) {
        $classes[] = $tailwind_classes_wide;
      } else {
        $classes[] = $tailwind_classes;
      }


      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
      $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';


      $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
      $id = $id ? ' id="' . esc_attr($id) . '"' : '';

      $output .= $indent . '';

      $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
      $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
      $attributes .= !empty($classes) ? $class_names : '';

      $item_output = $args->before;
      if ($item->wide == true) {
        $item_output .= '</div><div class="p-5 bg-gray-50 sm:p-8">';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<div class="flex items-center space-x-3">';
        $item_output .= '<div class="text-base font-medium leading-6 text-gray-900">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</div>';
        $item_output .= '<span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium leading-5 bg-brand-100 text-brand-800">';
        $item_output .= $item->pilltext;
        $item_output .= '</span>';
        $item_output .= '</div>';
        $item_output .= '<p class="text-sm leading-5 text-gray-500">';
        $item_output .= $item->description;
        $item_output .= '</p></a>';
      } else {
        $item_output .= '<a' . $attributes . '>';
        if ($item->icon) {
          $item_output .= '<div class="flex items-center justify-center flex-shrink-0 overflow-hidden text-white rounded-md">';
          $item_output .= wp_get_attachment_image($item->icon, 'icon', true, array("class" => "object-cover w-10 h-10 sm:h-12 sm:w-12"));
          $item_output .= '</div>';
        }
        $item_output .= '<div class="space-y-1">';
        $item_output .= '<p class="text-base font-medium leading-6 text-gray-900">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</p><p class="text-sm leading-5 text-gray-500">';
        $item_output .= $item->description;
        $item_output .= '</p></div></a>';
      }
      $item_output .= $args->after;
    }

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }


  function end_el(&$output, $item, $depth = 0, $args = array()) {
    $output .= "\n";
  }
}


// ACF options
add_filter('wp_nav_menu_objects', 'wp_main_menu_objects', 10, 2);

function wp_main_menu_objects($items, $args) {

  $advanced_parents = [];

  // loop
  foreach ($items as &$item) {

    // vars
    $type = get_field('dropdown_type', $item);
    if ($type) {
      $item->menu_type = $type;
    }

    $icon = get_field('icon', $item);
    if ($icon) {
      $item->icon = $icon;
    }

    $wide = get_field('wide', $item);
    if ($wide) {
      $item->wide = $wide;
    }

    $pilltext = get_field('pilltext', $item);
    if ($pilltext) {
      $item->pilltext = $pilltext;
    }
  }

  // return
  return $items;
}
