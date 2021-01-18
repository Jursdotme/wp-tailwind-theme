<?php
class Nav_Mobile_Secondary_Walker extends Walker_Nav_Menu {


	function start_lvl( &$output, $depth = 0, $args = array() ) {
		
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
    

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) { 

    $item_output = '';

    

      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      
      $class_names = $value = '';
      
      $tailwind_classes = 'text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out hover:text-gray-700';
      
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;
      $classes[] = $tailwind_classes;
      
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
      
      
      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
      
      $output .= $indent . '';
      
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
      $attributes .= ! empty( $classes) ? $class_names : '';
      
      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= '<div class="text-base font-medium leading-6 text-gray-900">';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</div>';
      $item_output .= '</a>';
      $item_output .= $args->after;
   
    

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}


	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "\n";
	}
}
