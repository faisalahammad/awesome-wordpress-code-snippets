<?php
/**
 * Disable Gravity Forms email notification when "Other Amounts" is 0 or $0.00.
 *
 * Replace '3' with your Gravity Form ID.
 * Replace '6915837c16509' with your Notification ID (nid).
 *
 * @author faisalahammad <me@faisalahammad>
 * @ticket https://community.gravityforms.com/t/using-conditional-logic-to-not-send-confirmation-email/19851/
 */

add_filter( 'gform_disable_notification_3', function ( $is_disabled, $notification, $form, $entry ) {

    if ( rgar( $notification, 'id' ) !== '6915837c16509' ) {
        return $is_disabled;
    }

    // Get the total amount from the form entry
    $total = GFCommon::get_total( GFCommon::get_product_fields( $form, $entry, false, false ) );

    // Disable notification if total is 0 or less
    if ( GFCommon::to_number( $total ) <= 0 ) {
        return true; // Returning TRUE disables this notification.
    }

    return $is_disabled;

}, 10, 4 );
