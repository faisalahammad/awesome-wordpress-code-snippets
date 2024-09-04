<?php

/**
 * Woocommerce Add Phone Number To Login Account
 * @author Faisal Ahammad
 */

// Enable login with phone number or email
add_filter( 'authenticate', 'login_with_phone_or_email', 20, 3 );

/**
 * @param  $user
 * @param  $username
 * @param  $password
 * @return mixed
 */
function login_with_phone_or_email( $user, $username, $password )
{
 if ( empty( $username ) ) {
  return $user;
 }

 if ( is_email( $username ) ) {
  $user = get_user_by( 'email', $username );
 } else {
  $user_query = new WP_User_Query( array(
   'meta_key'   => 'billing_phone',
   'meta_value' => $username,
   'number'     => 1,
  ) );

  $users = $user_query->get_results();
  if ( !empty( $users ) ) {
   $user = $users[ 0 ];
  }
 }

 if ( $user && wp_check_password( $password, $user->user_pass, $user->ID ) ) {
  return $user;
 }

 return null;
}
