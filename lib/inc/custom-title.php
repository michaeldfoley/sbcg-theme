<?php
  
/**
 * Adds the custom inner page title to the theme customizer
 */
function _sbcgtheme_title_customizer( $wp_customize ) {
    
    $wp_customize->add_setting(
        '_sbcgtheme_innertitle_textbox',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_text'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_innertitle_textbox',
        array(
            'label' => __( 'Inner Pages Title', '_sbcgtheme' ),
            'section' => 'title_tagline',
            'type' => 'text',
            'description' => __( 'This is a shortened title for the thin inner page header.', '_sbcgtheme' ),
            'priority' => 10
        )
    );
}
add_action( 'customize_register', '_sbcgtheme_title_customizer' );

?>