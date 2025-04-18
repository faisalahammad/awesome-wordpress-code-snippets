<?php
add_filter('gform_field_validation', function($result, $value, $form, $field) {
    // Specify the field IDs you want to restrict (example: 1, 2)
    $restricted_field_ids = [1, 2];

    if (in_array($field->id, $restricted_field_ids)) {
        // If value is an array (like Name field), convert it to a string
        if (is_array($value)) {
            $value = implode(' ', $value);
        }

        // Regex to allow English letters, numbers, spaces, and common punctuation
        if (!preg_match('/^[a-zA-Z0-9\s\.,\'"\-\!\?]*$/', $value)) {
            $result['is_valid'] = false;
            $result['message'] = 'Please enter English characters only.';
        }
    }
    return $result;
}, 10, 4);
