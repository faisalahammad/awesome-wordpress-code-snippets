<?php
/**
 * @snippet       Automatically Cancel Pending Orders After 1h
 * @compatible    WooCommerce 7
 * @author        Rodolfo Melogli
 */

add_action( 'woocommerce_order_status_pending', 'bbloomer_cancel_failed_pending_order_event' );

function bbloomer_cancel_failed_pending_order_event( $order_id )
{
 if ( !wp_next_scheduled( 'bbloomer_cancel_failed_pending_order_after_one_hour', array( $order_id ) ) ) {
  wp_schedule_single_event( time() + 3600, 'bbloomer_cancel_failed_pending_order_after_one_hour', array( $order_id ) );
 }
}

add_action( 'bbloomer_cancel_failed_pending_order_after_one_hour', 'bbloomer_cancel_order' );

/**
 * @param $order_id
 */
function bbloomer_cancel_order( $order_id )
{
 $order = wc_get_order( $order_id );
 wp_clear_scheduled_hook( 'bbloomer_cancel_failed_pending_order_after_one_hour', array( $order_id ) );
 if ( $order->has_status( array( 'pending' ) ) ) {
  $order->update_status( 'cancelled', 'Pending order cancelled after 1 hour' );
 }
}
