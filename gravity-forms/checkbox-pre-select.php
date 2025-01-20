<?php
/**
 * Pre-select first two checkbox options in Gravity Forms
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter( 'gform_pre_render', 'preselect_checkbox_options' );

/**
 * @param  $form
 * @return mixed
 */
function preselect_checkbox_options( $form )
{
 foreach ( $form[ 'fields' ] as &$current_form_field ) {
  if ( $current_form_field->type === 'checkbox' ) {
   foreach ( $current_form_field->choices as $choice_num => &$choice ) {
    // Set 'isSelected' to true for the first two choices
    if ( $choice_num < 2 ) {
     $choice[ 'isSelected' ] = true;
    }
   }
  }
 }

 return $form;
}
