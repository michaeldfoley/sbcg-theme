<?php
  
/**
 * Adds the custom banner sections to the theme customizer
 */
function _sbcgtheme_banner_customizer( $wp_customize ) {
  
    /**
     * Adds banners panel
     */
    $wp_customize->add_panel( 
      '_sbcgtheme_banner_panel', 
      array(
        'title' => __( 'Banners', '_sbcgtheme' ),
        'priority' => 105,
      ) 
    );
    
    
    /**
     * Top banner
     */
    $wp_customize->add_section(
        '_sbcgtheme_topbanner_section',
        array(
            'title' => __( 'Top Banner', '_sbcgtheme' ),
            'description' => __( 'This appears right below the nav.', '_sbcgtheme' ),
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
            'label' => __( 'Start Date', '_sbcgtheme' ),
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
            'label' => __( 'End Date', '_sbcgtheme' ),
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'datetime',
            'priority' => 16,
            'input_attrs' => array(
              'placeholder' => __( 'm/d/yyyy h:mm:ss am/pm', '_sbcgtheme' ),  
            )
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_topbanner_allposts'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_topbanner_allposts',
        array(
            'label' => __( 'Add to All Posts', '_sbcgtheme' ),
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'checkbox',
            'priority' => 18,
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_topbanner_allpages'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_topbanner_allpages',
        array(
            'label' => __( 'Add to All Pages', '_sbcgtheme' ),
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'checkbox',
            'priority' => 19,
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_topbanner_frontpage'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_topbanner_frontpage',
        array(
            'label' => __( 'Add to Homepage', '_sbcgtheme' ),
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'checkbox',
            'priority' => 20,
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_topbanner_page'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_topbanner_page',
        array(
            'label' => __( 'Add to a specific page', '_sbcgtheme' ),
            'section' => '_sbcgtheme_topbanner_section',
            'type' => 'dropdown-pages',
            'priority' => 17
        )
    );
    
    
    /**
     * Bottom banner
     */
    $wp_customize->add_section(
        '_sbcgtheme_bottombanner_section',
        array(
            'title' => __( 'Bottom Banner', '_sbcgtheme' ),
            'description' => __( 'This appears right above the footer.', '_sbcgtheme' ),
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
    
    $wp_customize->add_setting(
        '_sbcgtheme_bottombanner_allposts'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_bottombanner_allposts',
        array(
            'label' => __( 'Add to All Posts', '_sbcgtheme' ),
            'section' => '_sbcgtheme_bottombanner_section',
            'type' => 'checkbox',
            'priority' => 18,
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_bottombanner_allpages'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_bottombanner_allpages',
        array(
            'label' => __( 'Add to All Pages', '_sbcgtheme' ),
            'section' => '_sbcgtheme_bottombanner_section',
            'type' => 'checkbox',
            'priority' => 19,
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_bottombanner_frontpage'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_bottombanner_frontpage',
        array(
            'label' => __( 'Add to Homepage', '_sbcgtheme' ),
            'section' => '_sbcgtheme_bottombanner_section',
            'type' => 'checkbox',
            'priority' => 20,
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_bottombanner_page'
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_bottombanner_page',
        array(
            'label' => __( 'Add to a specific page', '_sbcgtheme' ),
            'section' => '_sbcgtheme_bottombanner_section',
            'type' => 'dropdown-pages',
            'priority' => 17
        )
    );
}
add_action( 'customize_register', '_sbcgtheme_banner_customizer' );

?>