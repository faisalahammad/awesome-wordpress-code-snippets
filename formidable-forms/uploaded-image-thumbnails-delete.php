<?php
/**
 * Delete uploaded image thumbnails after an entry is created
 * The code will deleted all the thumbnails in the wp-upload/uploads/formidable directory
 *
 * @package Formidable Forms
 */

function after_entry_created( $entry_id, $form_id )
{
 $upload_dir  = wp_upload_dir();
 $upload_path = $upload_dir[ 'basedir' ] . '/formidable/1';

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

add_action( 'frm_after_create_entry', 'after_entry_created', 50, 2 );
