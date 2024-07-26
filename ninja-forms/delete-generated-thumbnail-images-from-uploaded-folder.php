<?php
/**
 * Ninja Forms - Delete uploaded image thumbnails from the upload folder
 * @package Ninja Forms
 *
 * @author Faisal Ahammad
 */

/**
 * @param $form_data
 */
function delete_generated_thumbnail_images( $form_data )
{
 $upload_dir  = wp_upload_dir();
 $upload_path = $upload_dir[ 'basedir' ] . '/ninja-forms/58';

 // Patterns to match thumbnails
 $thumbnails_pattern = $upload_path . '**/{*-*x*.*,*-scaled.*}';

 $thumbnails = glob( $thumbnails_pattern, GLOB_BRACE );

 // Delete all thumbnails
 foreach ( $thumbnails as $thumbnail ) {
  if ( is_writable( $thumbnail ) ) {
   unlink( $thumbnail );
  }
 }
}

add_action( 'ninja_forms_after_submission', 'delete_generated_thumbnail_images' );
