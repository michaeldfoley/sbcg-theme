<?php
  
/**
 * Builds a gallery of images with the 'featured' image category
 */
 
 $args = array(
    'post_type' => 'attachment',
    'post_status' => 'inherit',
    'post_mime_type' => 'image/jpeg,image/gif,image/jpg,image/png',
    'tax_query' => array(
      array(
        'taxonomy' => 'image_cat',
        'field' => 'slug',
        'terms' => 'featured'
      )
    )
  );
  $query = new WP_Query($args);
  _e( "<div class=\"featured-images\">" );
  
  if($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); 
      $featured_img = wp_get_attachment_image_src( $post->ID, 'featured' )[0];
      $featured_img2x = wp_get_attachment_image_src( $post->ID, 'featured-2x' )[0];
      $featured_alt = get_post_meta($img_id , '_wp_attachment_image_alt', true);
      
      ?>
      <section class="featured-image js-lazyload" data-noscript="">
        <noscript>
          <img src="<?php echo $featured_img ?>" srcset="<?php echo $featured_img ?> 1x, <?php echo $featured_img2x ?> 2x" alt="<?php echo $featured_alt ?>">
        </noscript>
      </section>
      <?php
    endwhile;
  endif;
  
  _e("</div>");
?>