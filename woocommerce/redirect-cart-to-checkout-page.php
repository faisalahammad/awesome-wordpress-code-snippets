<?php
/**
 * Redirect to checkout after adding a product to cart.
 *
 * @return string $redirect_checkout The URL to redirect to after adding a product to cart.
 */
function AWCS_add_to_cart_redirect() {
    global $woocommerce;
    
    // Get the checkout URL.
    $redirect_checkout = $woocommerce->cart->get_checkout_url();
    
    return $redirect_checkout; // Return the checkout URL for redirection.
}

// Hook into the 'add_to_cart_redirect' filter to apply the redirection.
add_filter( 'add_to_cart_redirect', 'AWCS_add_to_cart_redirect' );
