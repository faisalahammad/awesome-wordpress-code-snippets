<?php
/**
 * Ninja Forms - Required Field Text Broken Code Fix
 * Source: https://wordpress.org/support/topic/html-code-showing-for-the-fields-required-form-message/#post-17760749
 * @package Ninja Forms
 */

add_filter( 'ninja_forms_i18n_front_end', 'fix_ninja_forms_i18n_front_end' );

/**
 * @param  $strings
 * @return mixed
 */
function fix_ninja_forms_i18n_front_end( $strings )
{
 $strings[ 'fieldsMarkedRequired' ] = 'Fields marked with an <span class="ninja-forms-req-symbol">*</span> are required';

 return $strings;
}
