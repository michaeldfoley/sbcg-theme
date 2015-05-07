<?php
  
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function _sbcgtheme_customizer( $wp_customize ) {
    /**
     * Adds Inner Pages Title
     */
    $wp_customize->add_section(
        '_sbcgtheme_innertitle_section',
        array(
            'title' => __( 'Inner Pages Title', '_sbcgtheme' ),
            'description' => __( 'This is a shortened title for the thin header.', '_sbcgtheme' ),
            'priority' => 35,
        )
    );
    
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
    
    
    /**
     * Adds Banners panel
     */
    $wp_customize->add_panel( 
      '_sbcgtheme_banner_panel', 
      array(
        'title' => __( 'Frontpage Banners', '_sbcgtheme' ),
        'description' => 'These appear on the homepage only.',
        'active_callback' => 'is_front_page',
        'priority' => 105,
      ) 
    );
    
    
    // Top Banner
    $wp_customize->add_section(
        '_sbcgtheme_topbanner_section',
        array(
            'title' => __( 'Top Banner', '_sbcgtheme' ),
            'description' => __( 'This appears right below the nav on the homepage.', '_sbcgtheme' ),
            'priority' => 10,
            'panel' => '_sbcgtheme_banner_panel'
        )
    );
    $wp_customize->add_setting(
        '_sbcgtheme_topbanner_textarea',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_text'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_topbanner_textarea',
        array(
            'label' => __( 'Top Banner', '_sbcgtheme' ),
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'textarea',
            'priority' => 10
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_topbanner_startdate',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_date'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_topbanner_startdate',
        array(
            'label' => 'Start Date',
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'datetime',
            'priority' => 15,
            'input_attrs' => array(
              'placeholder' => __( 'm/d/yyyy h:mm:ss am/pm', '_sbcgtheme' ),  
            )
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_topbanner_enddate',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_date'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_topbanner_enddate',
        array(
            'label' => 'End Date',
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'datetime',
            'priority' => 16,
            'input_attrs' => array(
              'placeholder' => __( 'm/d/yyyy h:mm:ss am/pm', '_sbcgtheme' ),  
            )
        )
    );
    
    
    // Bottom Banner
    $wp_customize->add_section(
        '_sbcgtheme_bottombanner_section',
        array(
            'title' => __( 'Bottom Banner', '_sbcgtheme' ),
            'description' => __( 'This appears right above the footer on the homepage.', '_sbcgtheme' ),
            'priority' => 20,
            'panel' => '_sbcgtheme_banner_panel'
        )
    );
    $wp_customize->add_setting(
        '_sbcgtheme_bottombanner_textarea',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_text'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_bottombanner_textarea',
        array(
            'label' => __( 'Bottom Banner', '_sbcgtheme' ),
            'section' => '_sbcgtheme_bottombanner_section',
            'type' => 'textarea',
            'priority' => 10
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_bottombanner_startdate',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_date'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_bottombanner_startdate',
        array(
            'label' => 'Start Date',
            'section' => '_sbcgtheme_bottombanner_section',
            'type' => 'datetime',
            'priority' => 15,
            'input_attrs' => array(
              'placeholder' => __( 'm/d/yyyy h:mm:ss am/pm', '_sbcgtheme' ),  
            )
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_bottombanner_enddate',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_date'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_bottombanner_enddate',
        array(
            'label' => 'End Date',
            'section' => '_sbcgtheme_bottombanner_section',
            'type' => 'datetime',
            'priority' => 16,
            'input_attrs' => array(
              'placeholder' => __( 'm/d/yyyy h:mm:ss am/pm', '_sbcgtheme' ),  
            )
        )
    );
}
add_action( 'customize_register', '_sbcgtheme_customizer' );

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