<?php

/**
 * Allow URLs starting with "www." in Gravity Forms website field validation.
 *
 * This simple PHP snippet allows users to enter URLs starting with "www." in the website field of Gravity Forms without requiring "https://". It modifies the validation logic to accept "www." by automatically prepending "https://" for validation. Ideal for WordPress developers looking to customize form URL validation.
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter('gform_field_validation', function ($result, $value, $form, $field) {
  if ($field->type !== 'website') {
    return $result;
  }

  if (! $result['is_valid'] && preg_match('/^www\./i', trim($value))) {
    $url_with_protocol = 'https://' . trim($value);

    if (GFCommon::is_valid_url($url_with_protocol)) {
      $result['is_valid'] = true;
      $result['message']  = '';
    }
  }

  return $result;
}, 10, 4);
