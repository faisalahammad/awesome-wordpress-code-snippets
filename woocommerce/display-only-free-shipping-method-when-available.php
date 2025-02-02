<?php
/**
 * Display Only Free Shipping Method When Available
 *
 * @author Faisal Ahammad
 * @package woocommerce
 */

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 100 );

function hide_shipping_when_free_is_available( $rates ) {
	$free = array();

	// Find free shipping methods.
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}

	// If free shipping is available, return only free shipping options.
	if ( ! empty( $free ) ) {
		return $free;
	}

	return $rates;
}
