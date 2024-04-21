<?php

add_action( 'woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice' );
  
function bbloomer_free_shipping_cart_notice() {
  
   $min_amount = 50; //change this to your free shipping threshold
   
   $current = WC()->cart->subtotal;
  
   if ( $current < $min_amount ) {
      $added_text = 'Get free shipping if you order ' . wc_price( $min_amount - $current ) . ' more!';
      $return_to = wc_get_page_permalink( 'shop' );
      $notice = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), 'Continue Shopping', $added_text );
      wc_print_notice( $notice, 'notice' );
   }
}