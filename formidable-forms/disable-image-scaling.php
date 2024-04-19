<?php
/**
 * Disable image scaling
 */

add_filter( 'big_image_size_threshold', '__return_false' );
