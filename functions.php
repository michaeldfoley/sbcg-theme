<?php
/**
 * _sbcgtheme functions and definitions
 *
 * @package _sbcgtheme
 */

/****************************************
Theme Setup
*****************************************/

/**
 * Theme initialization
 */
require get_template_directory() . '/lib/init.php';

/**
 * Custom theme functions definited in /lib/init.php
 */
require get_template_directory() . '/lib/theme-functions.php';

/**
 * Helper functions for use in other areas of the theme
 */
require get_template_directory() . '/lib/theme-helpers.php';

/**
 * Shortcodes for use in this theme
 */
require get_template_directory() . '/lib/theme-shortcodes.php';

/**
 * Taxonomies for use in this theme
 */
require get_template_directory() . '/lib/theme-taxonomies.php';

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/lib/inc/custom-header.php';

/**
 * Implement the Custom Sanitizers.
 */
require get_template_directory() . '/lib/inc/custom-sanitizers.php';

/**
 * Implement the Custom Title feature.
 */
require get_template_directory() . '/lib/inc/custom-title.php';

/**
 * Implement the Custom Banners feature.
 */
require get_template_directory() . '/lib/inc/custom-banners.php';

/**
 * Implement the Custom Contact Info feature.
 */
require get_template_directory() . '/lib/inc/custom-contact.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/lib/inc/jetpack.php';


/****************************************
Require Plugins
*****************************************/

require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
require get_template_directory() . '/lib/theme-require-plugins.php';

// add_action( 'tgmpa_register', 'mb_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/

/**
 * Define custom post type capabilities for use with Members
 */
add_action( 'admin_init', 'mb_add_post_type_caps' );
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}
