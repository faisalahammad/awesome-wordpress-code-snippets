<?php
/**
 * Ninja Forms phone export unescape plus
 *
 * Prevents the core CSV export from keeping a leading apostrophe for phone numbers that start with a plus sign (e.g. +441234567890). This snippet detects values like "'+441234..." added by CSV-escaping and removes the leading apostrophe only when the rest of the value matches a reasonable phone pattern.
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter('ninja_forms_subs_export_field_value_phone', function ($value, $field) {
    if (!is_string($value)) {
        $value = strval($value);
    }

    if (strlen($value) > 1 && $value[0] === "'" && $value[1] === '+') {
        $rest = substr($value, 1);
        // Allow digits, spaces, parentheses, hyphens, and plus signs
        if (preg_match('/^\+[0-9\s().-]+$/', $rest)) {
            return $rest; // strip the escape for phone numbers like +441234567890
        }
    }

    return $value;

}, 20, 2);
