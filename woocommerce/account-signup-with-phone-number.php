<?php

/**
 * Woocommerce Add Phone Number Field To Registration Form
 * @author Faisal Ahammad
 */

add_action( 'woocommerce_register_form', 'add_phone_field_to_registration' );

function add_phone_field_to_registration()
{
 ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_phone"><?php _e( 'Phone Number', 'woocommerce' );?> <span class="required">*</span></label>
        <input type="tel" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="reg_phone" value="<?php if ( !empty( $_POST[ 'phone' ] ) ) {
  echo esc_attr( $_POST[ 'phone' ] );
 }
 ?>" />
    </p>
    <?php
}

// Validate phone number on registration
add_action( 'woocommerce_register_post', 'validate_phone_number_on_registration', 10, 3 );

/**
 * @param  $username
 * @param  $email
 * @param  $validation_errors
 * @return mixed
 */
function validate_phone_number_on_registration( $username, $email, $validation_errors )
{
 if ( empty( $_POST[ 'phone' ] ) ) {
  $validation_errors->add( 'phone_error', __( 'Phone number is required!', 'woocommerce' ) );
 }

 if ( !preg_match( '/^[0-9]{10,15}$/', $_POST[ 'phone' ] ) ) {
  $validation_errors->add( 'phone_error', __( 'Please enter a valid phone number.', 'woocommerce' ) );
 }

 return $validation_errors;
}

// Save phone number on registration
add_action( 'woocommerce_created_customer', 'save_phone_number_on_registration' );

/**
 * @param $customer_id
 */
function save_phone_number_on_registration( $customer_id )
{
 if ( isset( $_POST[ 'phone' ] ) ) {
  update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST[ 'phone' ] ) );
 }
}
