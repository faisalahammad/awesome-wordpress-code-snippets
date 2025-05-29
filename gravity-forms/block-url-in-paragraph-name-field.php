<?php
/**
 * Gravity Forms - Block URL in Paragraph or Name Field
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 * @source: https://community.gravityforms.com/t/blocking-urls-in-paragraph-text-fields/
 */

add_filter( 'gform_field_validation_1_74', 'validate_input_1_74', 10, 4 );

function validate_input_1_74( $result, $value, $form, $field ) {
	$nourl_pattern = '(http|https)';
	if ( preg_match( $nourl_pattern, $value ) ) {
		$result['is_valid'] = false;
		$result['message']  = 'Message can not contain website addresses.';
	}

	return $result;
}