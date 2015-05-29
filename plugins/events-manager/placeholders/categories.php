<?php
/* @var $EM_Event EM_Event */
$count_cats = count($EM_Event->get_categories()->categories) > 0;
if( $count_cats > 0 ){
	?>
	<ul class="event-meta--categories">
		<?php foreach($EM_Event->get_categories() as $EM_Category): ?>
			<li class="tag tag-<?php echo $EM_Category->output("#_CATEGORYSLUG"); ?>"><?php 
  			
  			if ($EM_Category->output("#_CATEGORYIMAGEURL")):
    			$catImg = preg_replace('#^https?://#', '', $EM_Category->output("#_CATEGORYIMAGEURL"));
    			$catImg = ((preg_match('#^/?assets#', $catImg)) ? get_stylesheet_directory_uri() : '') . "/" . $catImg;
    			
    			echo "<a href=\"" . $EM_Category->output("#_CATEGORYURL") . "\">" . ((preg_match('#\.svg#', $catImg)) ? "<svg class=\"tag-icon\" role=\"presentation\" viewBox=\"0 0 100 100\"><use xlink:href=\"{$catImg}\" /></svg>" : "<img src=\"{$catImg}\">" ) . "</a>";
    		endif;
  			
  			echo  $EM_Category->output("#_CATEGORYLINK"); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php	
}else{
	echo get_option ( 'dbem_no_categories_message' );
}