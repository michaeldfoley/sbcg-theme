<?php
  
/**
 * Adds the custom sanitizers for the theme customizer
 */
 
function _sbcgtheme_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function _sbcgtheme_sanitize_date( $input ) {
    if ( strtotime($input) )
      $input = date('n/j/Y g:i:s a', strtotime($input));
    else
      $input = current_time('n/j/Y g:i:s a');
      
    return $input;
}

?>