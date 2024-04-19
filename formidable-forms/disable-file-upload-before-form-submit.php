<?php
/**
 * Disable file upload before form submit
 */

add_action( 'wp_ajax_nopriv_frm_submit_dropzone', 'block_dropzone_uploads', 1 );
add_action( 'wp_ajax_frm_submit_dropzone', 'block_dropzone_uploads', 1 );
function block_dropzone_uploads()
{
 $target_field_id = 996; // change 996 to the file upload field ID
 $field_id        = FrmAppHelper::get_param( 'field_id', '', 'post', 'absint' );
 if ( $target_field_id === $field_id ) {
  wp_die( 0 );
 }
}
