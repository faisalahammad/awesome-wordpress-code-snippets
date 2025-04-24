<?php
/**
 * Add multilingual support for required field text in Gravity Forms
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

 add_filter( 'gform_required_legend', 'dynamic_required_legend', 10, 2 );
 function dynamic_required_legend( $legend, $form ) {
     $form_id = $form['id'];

     // Change text based on which form is showing
     if( $form_id == 1 ) {
         return '<span class="gfield_required gfield_required_text">* Required fields (English)</span>';
     }
     elseif( $form_id == 2 ) {
         return '<span class="gfield_required gfield_required_text">* Campos obligatorios (Spanish)</span>';
     }
     elseif( $form_id == 3 ) {
         return '<span class="gfield_required gfield_required_text">* Champs obligatoires (French)</span>';
     }
     // Default text for any other forms
     else {
         return '<span class="gfield_required gfield_required_text">* Required fields</span>';
     }
 }