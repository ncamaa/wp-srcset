<?php
//IMG SRCSET BY ID
/**
* Responsive Image Helper Function PLUS PLUS
* @param string $image_id the id of the image (from ACF or similar)
* @param string $image_size the size of the thumbnail image or custom image size - 'thumbnail', 'medium', 'large', etc...
* @param string $max_width the max width this image will be shown to build the sizes attribute
* @param boolean $lazy -> change src to data-src, and srcset to data-srcset
*/
function print_responsive_image_attr($image_id, $image_size, $max_width, $lazy = false) {
// check the image ID is not blank
  if($image_id != '') {
  	// set the default src image size
  	$image_src = wp_get_attachment_image_url( $image_id, $image_size );
  	// set the srcset with various image sizes
  	$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
  	// generate the markup for the responsive image
  	if ($lazy) {
  		$data = 'data-';
  	} else {$data = '';}

  	echo $data.'src="'.$image_src.'" '.$data.'srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

  }
}
?>

<?php //example use

?>
<img <?php print_responsive_image_attr($image['id'], $image_size, $max_width, false) ?> alt="<?=$image['alt']; ?>">
