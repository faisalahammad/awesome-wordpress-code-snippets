<?php
/**
 *  Allow All File Types Upload In Multisite
 */

add_filter( 'site_option_upload_filetypes', 'allow_multisite_users' );
/**
 * @param  $upload_filetypes
 * @return mixed
 */
function allow_multisite_users( $upload_filetypes )
{
 $upload_filetypes .= ' wma'; // Replace wma with your file type

 return $upload_filetypes;
}
