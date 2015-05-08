<?php
  
/**
 * Adds the custom contact info section to the theme customizer
 */
function _sbcgtheme_contact_customizer( $wp_customize ) {
  
    /**
     * Adds contact panel
     */
    $wp_customize->add_panel( 
      '_sbcgtheme_contact_panel', 
      array(
        'title' => __( 'Contact Info', '_sbcgtheme' ),
        'priority' => 106,
      ) 
    );
    
    
    /**
     * Address
     */
    $wp_customize->add_section(
        '_sbcgtheme_address_section',
        array(
            'title' => __( 'Address', '_sbcgtheme' ),
            'priority' => 10,
            'panel' => '_sbcgtheme_contact_panel'
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_address_textarea',
        array(
            'sanitize_callback' => '_sbcgtheme_sanitize_text'
        )
    );
    $wp_customize->add_control(
        '_sbcgtheme_address_textarea',
        array(
            'label' => __( 'Address', '_sbcgtheme' ),
            'section' => '_sbcgtheme_address_section',
            'type' => 'textarea',
            'priority' => 10
        )
    );
    
    
    /**
     * Emails
     */
    $wp_customize->add_section(
        '_sbcgtheme_email_section',
        array(
            'title' => __( 'Contact Email', '_sbcgtheme' ),
            'description' => __( 'Contact email addresses that appear in the footer.', '_sbcgtheme' ),
            'priority' => 20,
            'panel' => '_sbcgtheme_contact_panel'
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_general_email',
        array(
            'sanitize_callback' => 'sanitize_email'
        )
    );
    $wp_customize->add_control(
        '_sbcgtheme_general_email',
        array(
            'label' => __( 'General Email', '_sbcgtheme' ),
            'section' => '_sbcgtheme_email_section',
            'type' => 'email',
            'priority' => 10
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_membership_email',
        array(
            'sanitize_callback' => 'sanitize_email'
        )
    );
    
    $wp_customize->add_control(
        '_sbcgtheme_membership_email',
        array(
            'label' => __( 'Membership Email', '_sbcgtheme' ),
            'section' => '_sbcgtheme_email_section',
            'type' => 'email',
            'priority' => 20
        )
    );
    
    
    /**
     * Social media
     */
    $wp_customize->add_section(
        '_sbcgtheme_social_section',
        array(
            'title' => __( 'Social Media', '_sbcgtheme' ),
            'description' => __( 'Social media accounts. URLs only.', '_sbcgtheme' ),
            'priority' => 30,
            'panel' => '_sbcgtheme_contact_panel'
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_facebook_url',
        array(
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        '_sbcgtheme_facebook_url',
        array(
            'label' => __( 'Facebook', '_sbcgtheme' ),
            'section' => '_sbcgtheme_social_section',
            'type' => 'url',
            'priority' => 10
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_twitter_url',
        array(
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        '_sbcgtheme_twitter_url',
        array(
            'label' => __( 'Twitter', '_sbcgtheme' ),
            'section' => '_sbcgtheme_social_section',
            'type' => 'url',
            'priority' => 10
        )
    );
    
    $wp_customize->add_setting(
        '_sbcgtheme_instagram_url',
        array(
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        '_sbcgtheme_instagram_url',
        array(
            'label' => __( 'Instagram', '_sbcgtheme' ),
            'section' => '_sbcgtheme_social_section',
            'type' => 'url',
            'priority' => 10
        )
    );
}
add_action( 'customize_register', '_sbcgtheme_contact_customizer' );

function _sbcgtheme_contacts() {
  $general = get_theme_mod( '_sbcgtheme_general_email');
  $membership = get_theme_mod( '_sbcgtheme_membership_email');
  $contacts = array();
  
  if ( !empty($general) ) { $contacts[ __( 'General', '_sbcgtheme' ) ] = $general; }
  if ( !empty($membership) && $general !== $membership ) { $contacts[ __( 'Membership', '_sbcgtheme' ) ] = $membership; }
  
  return $contacts;
}

function _sbcgtheme_social() {
  $facebook = get_theme_mod( '_sbcgtheme_facebook_url');
  $twitter = get_theme_mod( '_sbcgtheme_twitter_url');
  $instagram = get_theme_mod( '_sbcgtheme_instagram_url');
  $social = array();
  
  if ( !empty($facebook) ) { $social['facebook'] = $facebook; }
  if ( !empty($twitter) ) { $social['twitter'] = $twitter; }
  if ( !empty($instagram) ) { $social['instagram'] = $instagram; }
  
  return $social;
}

?>