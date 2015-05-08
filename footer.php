<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _sbcgtheme
 */
?>

	</div><!-- #content -->
  
  
	<?php if ( ( (is_front_page () && get_theme_mod( '_sbcgtheme_bottombanner_frontpage') )
  	            || ( is_page() && get_theme_mod( '_sbcgtheme_bottombanner_allpages') )
  	            || ( is_single() && get_theme_mod( '_sbcgtheme_bottombanner_allposts') )
  	            || ( is_page( get_theme_mod( '_sbcgtheme_bottombanner_page') ) && get_theme_mod( '_sbcgtheme_bottombanner_page') ) )
  	         && get_theme_mod( '_sbcgtheme_bottombanner_textarea' ) 
  	         && strtotime( get_theme_mod( '_sbcgtheme_bottombanner_startdate', 'now' ) ) <= current_time('timestamp')   
  	         && strtotime( get_theme_mod( '_sbcgtheme_bottombanner_enddate', '+25 years' ) ) > current_time('timestamp') ) : ?>
	<section class="banner banner-bottom">
  	<div class="container">
    	<?php _e( get_theme_mod( '_sbcgtheme_bottombanner_textarea' ) ) ?>
  	</div>
	</section>
	<?php endif; ?>
  
	<footer id="colophon" class="footer <?php _e( ( is_front_page () ) ? 'footer--homepage' : 'footer--inner' ) ?>" role="contentinfo">
  	<div class="container">
    	<div class="footer-row">
      	<?php if ( get_theme_mod( '_sbcgtheme_address_textarea')
        	         || get_theme_mod( '_sbcgtheme_general_email')
        	         || get_theme_mod( '_sbcgtheme_membership_email') ) : ?>
      	<section class="footer-contact">
        	<h4>Contact
        	  <?php foreach ( _sbcgtheme_social() as $type => $url ) { 
          	  _e( "<a href=\"{$url}\"><svg aria-label=\"{$type}\" class=\"footer-icon\"><use xlink:href=\"" . get_stylesheet_directory_uri() . "/assets/images/sprite.symbol.svg#{$type}\" /></svg></a>" );
            } ?>
        	</h4>
        	<div class="footer-emails">
          	<?php 
            	$sbcg_contacts = _sbcgtheme_contacts();
            	$sbcg_contacts_length = count($sbcg_contacts);
            	
            	foreach ( $sbcg_contacts as $type => $address ) { ?>
            	<div class="footer-email">
              	<?php _e( ( $sbcg_contacts_length > 1 ) ? $type . ': ' : '' ) ?>
              	<a href="mailto:<?php _e( $address ); ?>"><?php _e( $address ); ?></a>
            	</div>
              <?php } ?>
        	</div>
        	<address class="footer-address">
        	  <?php 
          	  _e( (get_theme_mod( '_sbcgtheme_address_link')) ? "<a href=\"" . get_theme_mod( '_sbcgtheme_address_link') . "\">" . get_theme_mod( '_sbcgtheme_address_textarea') . "</a>" : get_theme_mod( '_sbcgtheme_address_textarea') ); 
          	  ?>
        	</address>
      	</section>
      	<?php endif; ?>
      	
      	<nav id="footerNav" class="nav nav-footer footer-nav" role="navigation">
  			<?php wp_nav_menu( array( 'theme_location' => 'footer', 
    			                        'depth' => 2, 
    			                        'container' => '',
    			                        'menu_class' => 'nav-footer--list', 
    			                        'walker' => new Sbcg_Menu() ) ); ?>
    		</nav><!-- #site-navigation -->
    	</div>
    	
  		<div class="footer-info">
  			<p class="footer-copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>
  			<p class="footer-designer"><a href="http://twitter.com/michaeldfoley">Built by Michael Foley</a></p>
  		</div><!-- .footer-info -->
  	</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
