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
  
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<p class="copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
