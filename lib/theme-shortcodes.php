<?php
/**
 * _sbcgtheme theme shorycodes
 *
 * @package _sbcgtheme
 */


/**
 * Make sure to not add paragraph or link breaks to shortcodes
 *
 */
 
if( !function_exists('wpex_fix_shortcodes') ) {
	function wpex_fix_shortcodes($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'wpex_fix_shortcodes');
}


/**
 * Adds advertising cards
 *
 */
 
function cards_func( $atts, $content = '' ) {
  $args = shortcode_atts( array(
    'icon' => '',
    'title' => '',
  ), $atts );
  
  $out = sprintf( "\n<div class=\"card\">%s<div class=\"card-content\">%s%s</div></div>\n", 
          ($args['icon'] !== '') ? "<svg class=\"card-icon\" role=\"presentation\"><use xlink:href=\"" . get_stylesheet_directory_uri() . "/assets/images/sprite.symbol.svg#{$args['icon']}\" /></svg>" : "",
          ($args['title'] !== '') ? "<h4 class=\"card-title\">{$args['title']}</h4>" : "",
          $content
        );
    
  return $out;
}
add_shortcode( 'card', 'cards_func' );


/**
 * Adds row wrapper
 *
 */
 
function row_func( $atts, $content = '' ) {
  $args = shortcode_atts( array(
    'class' => 'row',
  ), $atts );
  $out = sprintf( "\n<section class=\"%s\">%s</section>\n",
          $args['class'], 
          do_shortcode( shortcode_unautop( $content ))
        );
    
  return $out;
}
add_shortcode( 'row', 'row_func' );

?>