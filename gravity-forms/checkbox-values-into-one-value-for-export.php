<?php
/**
 * Gravity Forms - Checkbox Values Into One Value For Export
 * Source: https: //community.gravityforms.com/t/aggregating-checkbox-values-into-one-value-for-export-resolved/15154
 */

class GWMapFieldToField
{
 public function __construct()
 {
  add_filter( 'gform_pre_submission', array( $this, 'map_field_to_field' ) );
 }

 /**
  * @param  $form
  * @return mixed
  */
 public function map_field_to_field( $form )
 {
  foreach ( $form[ 'fields' ] as &$field ) {
   if ( $field->get_input_type() == 'checkbox' ) {
    $input_ids = array_map( function ( $input ) {return $input[ 'id' ];}, $field->inputs );
    $input_values = array_map( 'rgpost', array_map( function ( $id ) {return 'input_' . str_replace( '.', '_', $id );}, $input_ids ) );
    $input_values        = array_filter( $input_values ); // remove empty values
    $field_values_string = implode( ', ', $input_values );

    // Assuming your hidden field's id is 999
    // Make sure to replace this with the actual id
    $_POST[ 'input_999' ] = $field_values_string;
   }
  }
 }
}

new GWMapFieldToField();
