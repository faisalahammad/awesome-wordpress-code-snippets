<?php
/**
 * Ninja Forms - Required Field Text Broken Code Fix
 * @package Ninja Forms
 *
 * @author Faisal Ahammad
 */

/**
 * @param  $strings
 * @return mixed
 */
function fix_ninja_forms_i18n_front_end( $strings )
{
  $strings[ 'fieldsMarkedRequired' ] = 'Fields marked with an <span class="ninja-forms-req-symbol">*</span> are required';

  return $strings;
}

add_filter( 'ninja_forms_i18n_front_end', 'fix_ninja_forms_i18n_front_end' );

// Alternative Code
/**
 * @param  $settings
 * @param  $form_id
 * @return mixed
 */
function decode_ninja_forms_display_form_settings( $settings, $form_id )
{
  $settings[ 'fieldsMarkedRequired' ] = html_entity_decode( $settings[ 'fieldsMarkedRequired' ] );

  return $settings;
}

add_filter( 'ninja_forms_display_form_settings', 'decode_ninja_forms_display_form_settings', 10, 2 );
