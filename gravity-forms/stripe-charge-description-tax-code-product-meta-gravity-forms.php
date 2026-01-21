<?php

/**
 * Modify Gravity Forms Stripe charge description when Tax Code is in product meta
 *
 * @description Modify Gravity Forms Stripe charge description by adding tax code from product meta for cleaner, SEO-friendly payment records.
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter('gform_stripe_charge_description', 'gf_custom_stripe_charge_description_from_product', 10, 5);

function gf_custom_stripe_charge_description_from_product($description, $strings, $entry, $submission_data, $feed)
{
  if (empty($submission_data['line_items'])) {
    return $description;
  }

  $first_product = reset($submission_data['line_items']);
  $tax_code = isset($first_product['id']) ? 'TC-' . $first_product['id'] : '';

  $short_description = '';
  if (isset($first_product['description']) && ! empty($first_product['description'])) {
    $short_description = str_replace('options: ', '', $first_product['description']);
  } elseif (isset($first_product['name'])) {
    $short_description = $first_product['name'];
  }

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

  // Truncate to 22 characters for Stripe
  return substr($new_description, 0, 22);
}
