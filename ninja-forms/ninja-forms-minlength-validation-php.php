<?php
/**
 * Ninja Forms minlength validation
 * @author Ron Rosenthal
 */

add_filter('ninja_forms_submit_data', 'custom_ninja_forms_minlength_validation');

function custom_ninja_forms_minlength_validation($form_data) {
    // Specify the field ID and minimum length
    $field_id = 123;
    $min_length = 20;

    if (isset($form_data['fields'][$field_id]['value']) && !empty($form_data['fields'][$field_id]['value'])) {
        $field_value = $form_data['fields'][$field_id]['value'];

        if (strlen($field_value) < $min_length) {
            $form_data['errors']['fields'][$field_id] = 'This field must contain at least ' . $min_length . ' characters.';
        }
    }

    return $form_data;
}