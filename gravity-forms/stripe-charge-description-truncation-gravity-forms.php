<?php

/**
 * Modify Gravity Forms Stripe charge description to "Tax Code - Short Description"
 *
 * @description Gravity Forms PHP snippet to generate and truncate Stripe charge descriptions with tax code and product short description. Ensures description fits Stripe's 22-character limit by truncating intelligently.
 * @author Faisal Ahammad <me@faisalahammad.com>
 */
add_filter('gform_stripe_charge_description', 'gf_custom_stripe_charge_description', 10, 5);
function gf_custom_stripe_charge_description($description, $strings, $entry, $submission_data, $feed)
{
  $tax_code_field_id = 5; // Change 5 to your actual Tax Code field ID

  // Get the Tax Code from the entry
  $tax_code = '';
  if (isset($entry[$tax_code_field_id])) {
    $tax_code = sanitize_text_field($entry[$tax_code_field_id]);
  }

  // Get the short description from the first product's description
  $short_description = '';
  if (! empty($submission_data['line_items'])) {
    $first_product = reset($submission_data['line_items']);
    if (isset($first_product['description']) && ! empty($first_product['description'])) {
      $short_description = str_replace('options: ', '', $first_product['description']);
    } elseif (isset($first_product['name'])) {
      // Fallback to product name if no description exists
      $short_description = $first_product['name'];
    }
  }

  // Build the new description
  $new_description = '';

  if (! empty($tax_code) && ! empty($short_description)) {
    $new_description = $tax_code . ' - ' . $short_description;
  } elseif (! empty($tax_code)) {
    $new_description = $tax_code;
  } elseif (! empty($short_description)) {
    $new_description = $short_description;
  } else {
    return $description;
  }

  // Stripe has a 22-character limit for charge descriptions
  if (strlen($new_description) > 22) {
    $separator = ' - ';
    $tax_code_length = strlen($tax_code);
    $separator_length = strlen($separator);
    $available_length = 22 - $tax_code_length - $separator_length;

    if ($available_length > 0) {
      $short_description = substr($short_description, 0, $available_length);
      $new_description = $tax_code . $separator . $short_description;
    } else {
      $new_description = substr($tax_code, 0, 22);
    }
  }

  return $new_description;
}
