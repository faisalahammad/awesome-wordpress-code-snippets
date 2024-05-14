<?php
/**
 * Image scaling threshold increase
 * Source: https://smartwp.com/large-image-scaling-wordpress/
 */

/**
 * @param  $threshold
 * @return int
 */
function smartwp_big_image_size_threshold( $threshold )
{
 return 4000;
}

add_filter( 'big_image_size_threshold', 'smartwp_big_image_size_threshold', 999, 1 );
