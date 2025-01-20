<?php
/**
 * Bypass Gravity Forms template library for non-admin users
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter( 'gform_bypass_template_library', 'fa_bypass_template_library' );

/**
 * @param $bypass
 */
function fa_bypass_template_library( $bypass )
{
 // Check if the current user is an admin
 if ( current_user_can( 'administrator' ) ) {
  return false;
 }

 return true;
}
