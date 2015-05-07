<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _sbcgtheme
 */
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

	<header id="masthead" class="header<?php _e( ( is_front_page () ) ? ' header--homepage' : ' header--inner' ) ?>" role="banner">
		<div class="header-branding<?php _e( ( is_front_page () ) ? ' header-branding--homepage ' : '' ) ?>">
  		<?php if (is_front_page ()) : ?>
  		<div class="header-logo">
    		<div class="header-img">
      		<svg aria-label="Urban Garden"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sprite.symbol.svg#logo-web" /></svg>
    		</div>
      </div>
      
  		<?php endif; ?>
      
      
			<h1 class="header-title<?php _e( ( is_front_page () ) ? ' header-title--homepage' : '' ) ?>">
  			<a href="<?php _e( esc_url( home_url( '/' ) ) ); ?>" rel="home">
    			<?php _e( ( empty( get_theme_mod( '_sbcgtheme_innertitle_textbox' ) ) ) || is_front_page () ?  bloginfo( 'name' ) : get_theme_mod( '_sbcgtheme_innertitle_textbox' )  )  ?>
    		</a>
      </h1>
		</div>
  
		<nav id="site-navigation" class="<?php _e( ( is_front_page () ) ? 'nav-primary--homepage ' : '' ) ?>nav-primary collapse" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 
  			                        'depth' => 1, 
  			                        'container' => '',
  			                        'menu_class' => 'nav-primary--list nav-menu collapse', 
  			                        'walker' => new Sbcg_Menu() ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
  	
	<?php if ( is_front_page ()
  	         && get_theme_mod( '_sbcgtheme_topbanner_textarea' ) 
  	         && strtotime( get_theme_mod( '_sbcgtheme_topbanner_startdate', 'now' ) ) <= current_time('timestamp')   
  	         && strtotime( get_theme_mod( '_sbcgtheme_topbanner_enddate', '+100 years' ) ) > current_time('timestamp') ) : ?>
	<section class="banner banner-top">
  	<div class="container">
    	<?php _e( get_theme_mod( '_sbcgtheme_topbanner_textarea' ) ) ?>
  	</div>
	</section>
	<?php endif; ?>

	<div id="content" class="container">
