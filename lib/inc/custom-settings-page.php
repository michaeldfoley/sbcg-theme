<?php
/**
 * Adds the Customize page to the WordPress admin area
 */
 
function _sbcgtheme_customizer_menu() {
    add_theme_page( 'SBCG Settings', 'SBCG Settings', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', '_sbcgtheme_customizer_menu' );

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function _sbcgtheme_customizer( $wp_customize ) {
    $wp_customize->add_section(
        '_sbcgtheme_innertitle_section',
        array(
            'title' => 'Inner Pages Title',
            'description' => 'This is a shortened title for the thin header.',
            'priority' => 35,
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_innertitle_textbox',
        array(
            'default' => '',
            'sanitize_callback' => '_sbcgtheme_sanitize_text'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_innertitle_textbox',
        array(
            'label' => 'Inner Pages Title',
            'section' => '_sbcgtheme_innertitle_section',
            'type' => 'text',
        )
    );
}
add_action( 'customize_register', '_sbcgtheme_customizer' );

function _sbcgtheme_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
?>