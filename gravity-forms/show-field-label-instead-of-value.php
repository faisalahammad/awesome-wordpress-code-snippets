<?php
/**
 * Gravity Forms - Show Field Label Instead of Value
 * Source: https://community.gravityforms.com/t/how-to-show-label-instead-of-value-in-entries-for-specific-field-and-form/17345
 */

add_filter( 'gform_entries_field_value', function ( $value, $form_id, $field_id, $entry ) {
 $field        = GFAPI::get_field( $form_id, $field_id );
 $value_fields = array(
  'select',
 );
 if ( is_numeric( $field_id ) && in_array( $field->get_input_type(), $value_fields ) ) {
  $value = $field->get_value_entry_detail( RGFormsModel::get_lead_field_value( $entry, $field ), '', true, 'text' );
 }

 return $value;
}, 10, 4 );
