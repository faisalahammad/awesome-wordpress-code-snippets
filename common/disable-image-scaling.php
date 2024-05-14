<?php

/**
 * Disable image scaling
 * Source: https://smartwp.com/large-image-scaling-wordpress/
 */

add_filter( 'big_image_size_threshold', '__return_false' );