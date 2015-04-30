<?php
/**
 * _sbcgtheme theme functions definted in /lib/init.php
 *
 * @package _sbcgtheme
 */


/**
 * Register Widget Areas
 */
function mb_widgets_init() {
	// Main Sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_sbcgtheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

/**
 * Remove Dashboard Meta Boxes
 */
function mb_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

/**
 * Change Admin Menu Order
 */
function mb_custom_menu_order( $menu_ord ) {
	if ( !$menu_ord ) return true;
	return array(
		// 'index.php', // Dashboard
		// 'separator1', // First separator
		// 'edit.php?post_type=page', // Pages
		// 'edit.php', // Posts
		// 'upload.php', // Media
		// 'gf_edit_forms', // Gravity Forms
		// 'genesis', // Genesis
		// 'edit-comments.php', // Comments
		// 'separator2', // Second separator
		// 'themes.php', // Appearance
		// 'plugins.php', // Plugins
		// 'users.php', // Users
		// 'tools.php', // Tools
		// 'options-general.php', // Settings
		// 'separator-last', // Last separator
	);
}

/**
 * Hide Admin Areas that are not used
 */
function mb_remove_menu_pages() {
	// remove_menu_page( 'link-manager.php' );
}

/**
 * Remove default link for images
 */
function mb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ( $image_set !== 'none' ) {
		update_option( 'image_default_link_type', 'none' );
	}
}

/**
 * Custom menu walker
 */

class Sbcg_Menu extends Walker {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * If there are custom classes, we'll add those as well. If the item is
     * the current page, it will get the class of active.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = get_post_meta( $item->ID, '_menu_item_classes', true );
        if ( intval($item->object_id) === get_the_ID() ) {
          $classes[] = 'active';
        }
        $output .= sprintf( "\n<li%s><a href='%s'>%s</a></li>\n",
            ( count($classes) > 0 ) ? ' class="' . implode(' ', $classes) . '"' : '',
            $item->url,
            $item->title
        );
    }
}

/**
 * Enqueue scripts
 */
function mb_scripts() {
	wp_enqueue_style( '_sbcgtheme-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( !is_admin() ) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'customplugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery'), NULL, true );
		wp_enqueue_script( 'customscripts', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), NULL, true );
		
	}
}


function sbcg_inline_scripts() {
  if ( !is_admin() ) { ?>
		<script>
      (function(d) {
        var config = {
          kitId: 'zmp6xby',
          scriptTimeout: 3000
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
      (function(f,l,m,e,g,n){function h(a,b){if(b){var c=b.getAttribute("viewBox"),d=f.createDocumentFragment(),e=b.cloneNode(!0);for(c&&a.setAttribute("viewBox",c);e.childNodes.length;)d.appendChild(e.childNodes[0]);a.appendChild(d)}}function p(){var a=f.createElement("x"),b=this.s;a.innerHTML=this.responseText;this.onload=function(){b.splice(0).map(function(b){h(b[0],a.querySelector("#"+b[1].replace(/(\W)/g,"\\$1")))})};this.onload()}function k(){for(var a;a=l[0];)if(g){var b=new Image;b.src=a.getAttribute("xlink:href").replace("#",
".").replace(/^\./,"")+".png";a.parentNode.replaceChild(b,a)}else{var b=a.parentNode,c=a.getAttribute("xlink:href").split("#"),d=c[0],c=c[1];b.removeChild(a);if(d.length){if(a=e[d]=e[d]||new XMLHttpRequest,a.s||(a.s=[],a.open("GET",d),a.onload=p,a.send()),a.s.push([b,c]),4===a.readyState)a.onload()}else h(b,f.getElementById(c))}m(k)}(g||n)&&k()})(document,document.getElementsByTagName("use"),window.requestAnimationFrame||window.setTimeout,{},/MSIE\s[1-8]\b/.test(navigator.userAgent),/Trident\/[567]\b/.test(navigator.userAgent)||
537>(navigator.userAgent.match(/AppleWebKit\/(\d+)/)||[])[1],document.createElement("svg"),document.createElement("use"));
    </script>
  <?php }
}

/**
 * Remove Query Strings From Static Resources
 */
function mb_remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}

/**
 * Remove Read More Jump
 */
function mb_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ($offset) {
		$end = strpos( $link, '"',$offset );
	}
	if ($end) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
