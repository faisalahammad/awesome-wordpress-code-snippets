<?php

/**
 * UK Postcode Validation for Gravity Forms
 * Adds custom validation using regex to ensure proper UK postcode format.
 *
 * Usage: Replace X_Y with your form ID and field ID (e.g., 5_3).
 * @author Faisal Ahammad <me@faisalahammad.com>
 * @source https://community.gravityforms.com/t/input-mask-for-uk-postcode/20004
 */

add_filter('gform_field_validation_X_Y', 'validate_uk_postcode', 10, 4);
function validate_uk_postcode($result, $value, $form, $field)
{

  if ($result['is_valid']) {

    // UK postcode regex pattern supporting formats with or without space
    $pattern = '/^([A-Z]{1,2}\d{1,2}[A-Z]?)\s?(\d[A-Z]{2})$/i';

    $clean_value = trim(preg_replace('/\s+/', ' ', $value));

    // Validate postcode format
    if (! preg_match($pattern, $clean_value)) {
      $result['is_valid'] = false;
      $result['message'] = 'Please enter a valid UK postcode (e.g., SW1A 1AA).';
    }
  }

  return $result;
}
