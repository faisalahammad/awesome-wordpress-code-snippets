<?php

/**
 * WooCommerce Merge Email and Phone on Checkout
 * @author Faisal Ahammad
 */

add_filter( 'woocommerce_checkout_fields', 'customize_checkout_fields_checkout' );

/**
 * @param  $fields
 * @return mixed
 */
function customize_checkout_fields_checkout( $fields )
{
 // Remove default email and phone fields
 unset( $fields[ 'billing' ][ 'billing_email' ] );
 unset( $fields[ 'billing' ][ 'billing_phone' ] );

 // Add merged email/phone field
 $fields[ 'billing' ][ 'billing_email_phone' ] = array(
  'label'    => __( 'Email or Phone Number', 'woocommerce' ),
  'required' => true,
  'class'    => array( 'form-row-wide' ),
  'priority' => 20,
 );

 return $fields;
}

// Validate merged email or phone number on checkout
add_action( 'woocommerce_checkout_process', 'validate_email_or_phone_on_checkout' );

function validate_email_or_phone_on_checkout()
{
 if ( empty( $_POST[ 'billing_email_phone' ] ) ) {
  wc_add_notice( __( 'An email address or phone number is required!', 'woocommerce' ), 'error' );
 } else {
  $email_phone = sanitize_text_field( $_POST[ 'billing_email_phone' ] );

  if ( !is_email( $email_phone ) && !preg_match( '/^01[3-9]\d{8}$/', $email_phone ) ) {
   wc_add_notice( __( 'Please enter a valid email address or Bangladeshi phone number (e.g., 017xxxxxxxx).', 'woocommerce' ), 'error' );
  }
 }
}

// Save email or phone number during checkout
add_action( 'woocommerce_checkout_update_order_meta', 'save_email_or_phone_on_checkout' );

/**
 * @param $order_id
 */
function save_email_or_phone_on_checkout( $order_id )
{
 if ( isset( $_POST[ 'billing_email_phone' ] ) ) {
  $email_phone = sanitize_text_field( $_POST[ 'billing_email_phone' ] );

  if ( is_email( $email_phone ) ) {
   update_post_meta( $order_id, '_billing_email', $email_phone );
   update_post_meta( $order_id, '_billing_phone', '' );
  } else {
   update_post_meta( $order_id, '_billing_phone', $email_phone );
   update_post_meta( $order_id, '_billing_email', '' );
  }
 }
}
