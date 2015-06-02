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
?>