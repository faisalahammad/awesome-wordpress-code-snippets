<?php
/**
 * Gravity Forms - Run Confirmation Script Only Once
 * Source: https: //community.gravityforms.com/t/gravity-form-gform-confirmation-script-is-running-multiple-times/14620/2
 */

add_filter( 'gform_confirmation_7', 'custom_popup_confirmation_for_sgtracking', 10, 4 );

/**
 * @param  $confirmation
 * @param  $form
 * @param  $entry
 * @param  $ajax
 * @return mixed
 */
function custom_popup_confirmation_for_sgtracking( $confirmation, $form, $entry, $ajax )
{
 // If confirmation is not a string, return it unchanged
 if ( !is_string( $confirmation ) ) {
  return $confirmation;
 }

 // Get the popupstatus and emailvalue from the form entry
 $popupstatus = rgar( $entry, '4' );
 $emailvalue  = rgar( $entry, '1' );
 $test_bug    = 'test_bug';

 // If popupstatus is "true", add JavaScript code to the confirmation message
 if ( $popupstatus == "true" ) {
  $confirmation .= GFCommon::get_inline_script_tag( "
            // Check if the flag is already set to prevent multiple executions
            if (window.top.popupConfirmationLoaded) {
                console.log('$test_bug /skipping');
            } else {
                // Set the flag to true to prevent further executions
                window.top.popupConfirmationLoaded = true;
                console.log('$test_bug /running');
            }
        " );
 }

 return $confirmation;
}
