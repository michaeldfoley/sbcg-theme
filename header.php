<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _sbcgtheme
 */
 
$page_id = get_queried_object_id();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<a class="skip-link sr" href="#content"><?php _e( 'Skip to content', '_sbcgtheme' ); ?></a>

	<header id="masthead" class="header <?php _e( ( is_front_page () ) ? 'header--homepage' : 'header--inner' ) ?>" role="banner">
		<div class="header-branding<?php _e( ( is_front_page () ) ? ' header-branding--homepage ' : '' ) ?>">
  		<?php if (is_front_page ()) : ?>
  		<div class="header-logo">
    		<div class="header-img">
      		<svg aria-label="Urban Garden"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sprite.symbol.svg#logo-web" /></svg>
    		</div>
      </div>
      
  		<?php endif; ?>
      
      
			<h1 class="header-title <?php _e( ( is_front_page () ) ? 'header-title--homepage' : 'header-title--inner' ) ?>">
  			<a href="<?php _e( esc_url( home_url( '/' ) ) ); ?>" rel="home">
    			<?php _e( ( empty( get_theme_mod( '_sbcgtheme_innertitle_textbox' ) ) ) || is_front_page () ?  bloginfo( 'name' ) : get_theme_mod( '_sbcgtheme_innertitle_textbox' )  )  ?>
    		</a>
      </h1>
		</div>
  
		<nav id="site-navigation" class="nav <?php _e( ( is_front_page () ) ? 'nav-primary--homepage ' : '' ) ?>nav-primary collapse" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 
  			                        'depth' => 1, 
  			                        'container' => '',
  			                        'menu_class' => 'nav-primary--list nav-menu collapse', 
  			                        'walker' => new Sbcg_Menu() ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	<?php if ( ( (is_front_page () && get_theme_mod( '_sbcgtheme_topbanner_frontpage') )
  	            || ( is_page() && get_theme_mod( '_sbcgtheme_topbanner_allpages') )
  	            || ( is_single() && get_theme_mod( '_sbcgtheme_topbanner_allposts') )
  	            || ( is_page( get_theme_mod( '_sbcgtheme_topbanner_page') ) && get_theme_mod( '_sbcgtheme_topbanner_page') ) )
  	         && get_theme_mod( '_sbcgtheme_topbanner_textarea' ) 
  	         && strtotime( get_theme_mod( '_sbcgtheme_topbanner_startdate', 'now' ) ) <= current_time('timestamp')   
  	         && strtotime( get_theme_mod( '_sbcgtheme_topbanner_enddate', '+100 years' ) ) > current_time('timestamp') ) : ?>
	<section class="banner banner-top">
  	<div class="container">
    	<?php _e( get_theme_mod( '_sbcgtheme_topbanner_textarea' ) ); ?>
  	</div>
	</section>
	<?php endif; ?>
  
  <?php if ( has_post_thumbnail( $page_id ) ) : 
        $img_sizes = array( 'bp-xxs', 'bp-xs', 'bp-sm', 'bp-md', 'bp-lg' );
        $img_srcset = '';
        $img_id = get_post_thumbnail_id( $page_id );
        
        foreach( $img_sizes as $size ) {
          $img_srcset .= wp_get_attachment_image_src( $img_id, $size )[0] . ' ' . wp_get_attachment_image_src( $img_id, $size )[1] . 'w, ';
        }
        
  ?>
    <div class="header-thumb">
      <img src="<?php _e( wp_get_attachment_image_src( $img_id, 'full' )[0] ); ?>" srcset="<?php _e( $img_srcset ); ?>" alt="<?php _e( get_post_meta($img_id , '_wp_attachment_image_alt', true) ) ?>">
   </div>
	<?php endif; ?>
	
	
	<?php
  if ( is_front_page() && !has_post_thumbnail( $page_id ) ) :
  	require get_template_directory() . '/lib/inc/header-gallery.php';
  endif;
  ?>
	
	<div id="content" class="page-content container">
