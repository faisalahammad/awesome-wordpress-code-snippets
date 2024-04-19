<?php
/**
 * Formidable Forms - Randomizing File Names
 */

add_action( 'wp_ajax_nopriv_frm_submit_dropzone', 'add_upload_prefilter', 1 );
add_action( 'wp_ajax_frm_submit_dropzone', 'add_upload_prefilter', 1 );

/**
 * @return mixed
 */
function add_upload_prefilter()
{
 add_filter(
  'wp_handle_upload_prefilter',
  function ( $file ) {
   $file[ 'name' ] = randomize_filename( $file[ 'name' ] );

   return $file;
  }
 );
}

/**
 * @param $name
 */
function randomize_filename( $name )
{
 $split      = explode( '.', $name, 2 );
 $split[ 0 ] = uniqid();

 return implode( '.', $split );
}
