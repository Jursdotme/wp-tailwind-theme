<?php
class Nav_Footer_Walker extends Walker_Nav_Menu {


	function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ($depth == 0) {
      $output .= '<ul class="flex flex-wrap -mx-2 sm:block">';
    }
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		
    if ($depth == 0) {
      $output .= '</ul></div>';
    }

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    
    if (in_array("menu-item-has-children", $item->classes) && $depth == 0) 
    {

      
      $item_output = $args->before;
      $item_output .= '<div><h4 class="text-sm font-semibold leading-5 tracking-wider text-gray-400 uppercase">';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</h4>';
      $item_output .= $args->after;

    } 
    elseif ($depth == 1) {        
      $tailwind_classes = 'text-base leading-6 text-gray-300 hover:text-white';
      
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;
      $classes[] = $tailwind_classes;
      
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
      
      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
            
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
      $attributes .= $class_names;
      
      $item_output = $args->before;
      $item_output .= '<li class="px-2 mt-4 space-y-4">';
      $item_output .= '<a'. $attributes .'>';
      $item_output .= '<p class="text-base font-medium leading-6 text-gray-900">';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a></li>';
      $item_output .= $args->after;
    }

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}


	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "\n";
	}
}